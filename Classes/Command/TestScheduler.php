<?php

declare(strict_types=1);

namespace NITSAN\NsMobile\Command;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TestScheduler extends Command
{
    /**
     * Configure the command by defining the name, options and arguments
     */
    protected function configure()
    {
        $this->setDescription('Clean up Scheduler');
        $this->setHelp('This command delete data from databases.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
        $affectedRows = $queryBuilder
            ->delete('tx_nsmobile_domain_model_mobile')
            ->where(
                $queryBuilder->expr()->eq('deleted', $queryBuilder->createNamedParameter(1))
            )
            ->executeStatement();
        if ($affectedRows) {
            return Command::SUCCESS;
        } 
        return Command::SUCCESS;
    }
}
