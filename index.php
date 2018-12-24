<?php

declare(strict_types=1);

namespace PSRLogPoC;

use Psr\Log\LoggerInterface;
use Monolog\Logger;

include "./vendor/autoload.php";

class PSRLogPoC
{
    /**
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * PSRLogPoC constructor.
     * @param LoggerInterface|null $logger
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    /**
     * a function that test that the Monolog Logger can be passed to PSRLogPoC constructor.
     */
    public function doSomething()
    {
        if ($this->logger) {
            $this->logger->info('Log passing an interface object Monolog in the PSRLogPoC constructor as an argument.');
        }
        else{
            echo "No logger was passed to this function.";
        }
        // do something useful
    }
}

//This logger displays logs for PHP scripts
$logger = new Logger('my_app');
$logger->info('Log using Monolog');
$psrLogger = new PSRLogPoC($logger);
$psrLogger->doSomething();
