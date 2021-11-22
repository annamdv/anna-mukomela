<?php

declare(strict_types=1);

namespace Annam\Install\Command;

use Annam\Blog\Model\Post\Repository as PostRepository;
use Annam\Blog\Model\Category\Repository as CategoryRepository;
use Annam\Blog\Model\Author\Repository as AuthorRepository;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateData extends \Symfony\Component\Console\Command\Command
{
    protected static $defaultName = 'install:generate-data';

    private \Annam\Framework\Database\Adapter\AdapterInterface $adapter;
    private OutputInterface $output;
    private int $postsNumber = 0;
    private const AUTHOR_COUNT = 20;
    private const STATISTIC_DAYS = 1;

    /**
     * @param \Annam\Framework\Database\Adapter\AdapterInterface $adapter
     * @param string|null $name
     */
    public function __construct(
        \Annam\Framework\Database\Adapter\AdapterInterface $adapter,
        string $name = null
    ) {
        parent::__construct($name);
        $this->adapter = $adapter;
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setDescription('Generate demo data for blog testing');

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->output = $output;
        $this->generateData();
        $output->writeln('Completed!');

        return self::SUCCESS;
    }

    /**
     * @return void
     */
    private function generateData(): void
    {
        $this->profile([$this, 'truncateTables']);
        $this->profile([$this, 'generateAuthors']);
        $this->profile([$this, 'generatePosts']);
        $this->profile([$this, 'generateDailyStatistics']);
        $this->profile([$this, 'generateCategories']);
        $this->profile([$this, 'generateCategoryPosts']);
    }

    /**
     * @return void
     */
    private function truncateTables(): void
    {
        $tables = [
            AuthorRepository::TABLE,
            PostRepository::TABLE,
            PostRepository::TABLE_DAILY_STATISTICS,
            CategoryRepository::TABLE,
            PostRepository::TABLE_CATEGORY_POST,
        ];
        $connection = $this->adapter->getConnection();
        $connection->query('SET FOREIGN_KEY_CHECKS=0');

        foreach ($tables as $table) {
            $connection->query("TRUNCATE TABLE `$table`");
            $this->output->writeln("Truncated table: $table");
        }

        $connection->query('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * @return void
     */
    private function generateAuthors(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO author (`name`, `url`)
                VALUES (:name, :url);
            SQL
            );
        for ($i = 1; $i <= self::AUTHOR_COUNT; $i++) {
            $name = $this->getRandomName();
            $statement->bindValue(':name', $name);
            $statement->bindValue(':url', str_replace(' ', '_', strtolower($name)));
            $statement->execute();
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function generatePosts(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO post (`title`, `url`, `author_id`)
                VALUES (:title, :url, :author_id);
            SQL
            );
        $postId = 1;

        for ($authorId = 1; $authorId <= self::AUTHOR_COUNT; $authorId++) {
            $postsNumber = random_int(5, 20);

            for ($i = 1; $i <= $postsNumber; $i++) {
                $title = "Post $postId";
                $statement->bindValue(':title', $title);
                $statement->bindValue(':url', str_replace(' ', '_', strtolower($title)));
                $statement->bindValue(':author_id', $authorId, \PDO::PARAM_INT);
                $statement->execute();
                $postId++;
            }
        }

        $this->postsNumber = $postId - 1;
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function generateDailyStatistics(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO `daily_statistics` (`post_id`, `statistics_date`, `views`)
                VALUES (:post_id, :statistics_date, :views);
            SQL
            );

        for ($day = self::STATISTIC_DAYS; $day >= 1; $day--) {
            $statistics_date = date('Y-m-d', strtotime("-$day days"));

            for ($postId = 1; $postId <= $this->postsNumber; $postId++) {
                $statement->bindValue(':post_id', $postId, \PDO::PARAM_INT);
                $statement->bindValue(':statistics_date', $statistics_date);
                $statement->bindValue(':views', random_int(0, 100), \PDO::PARAM_INT);
                $statement->execute();
            }
        }
    }
    /**
     * @return void
     */
    private function generateCategories(): void
    {
        $categories = [
            'Best Practices', 'Customer Stories', 'Marketplace', 'Events',
            'Technical', 'Category 6', 'Category 7', 'Category 8', 'Category 9',
            'Category 10',
        ];
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO category (`title`, `url`)
                VALUES (:title, :url);
            SQL
            );
        foreach ($categories as $category) {
            $statement->bindValue(':title', $category);
            $statement->bindValue(':url', str_replace(' ', '-', strtolower($category)));
            $statement->execute();
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function generateCategoryPosts(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO category_post (`post_id`, `category_id`)
                VALUES (:post_id, :category_id);
            SQL
            );
        $categoryIds = array_rand(array_flip(range(1, 10)), 7);

        for ($i = 1; $i <= $this->postsNumber; $i++) {
            $postCategories = (array)array_rand(array_flip($categoryIds), random_int(1, 3));

            foreach ($postCategories as $categoryId) {
                $statement->bindValue(':post_id', $i, \PDO::PARAM_INT);
                $statement->bindValue(':category_id', $categoryId, \PDO::PARAM_INT);
                $statement->execute();
            }
        }
    }

    /**
     * @return string
     */
    private function getRandomName(): string
    {
        static $randomNames = [
            'Corey Dulimba','Peter Sheldon','Corey Gelato','Ken Hicks','Nicole Teriaca',
            'Emogene Smith','Cinthia Jones','Magaret Mitchel','Daria Rich','Ellyn Sheldon',
            'Rhoda Rymes', 'Debbra Collins','Reid Torn','Desire Maxwel','Sueann Smith',
            'Shemeka Jones','Julian Mad','Winona Rider','Billie Johnes','Michaela Smith'
        ];

        return $randomNames[array_rand($randomNames)];
    }

    /**
     * @param callable $callback
     * @return void
     */
    private function profile(callable $callback): void
    {
        $start = microtime(true);
        $callback();
        $totalTime = number_format(microtime(true) - $start, 4);
        $this->output->writeln("Executing <info>$callback[1]</info> took <info>$totalTime</info>");
    }
}
