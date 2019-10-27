<?php
/**
 * Created by PhpStorm.
 * User: volmarg
 * Date: 29.05.19
 * Time: 20:59
 */

namespace App\Controller\Utils;


use App\Services\Translator;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Application extends AbstractController {

    /**
     * @var Repositories
     */
    public $repositories;

    /**
     * @var Forms
     */
    public $forms;

    /**
     * @var EntityManagerInterface
     */
    public $em;

    /**
     * @var Translator $translator
     */
    public $translator;

    /**
     * @var LoggerInterface $logger
     */
    public $logger;

    public function __construct(Repositories $repositories, Forms $forms, EntityManagerInterface $em, LoggerInterface $logger) {
        $this->repositories     = $repositories;
        $this->logger           = $logger;
        $this->forms            = $forms;
        $this->em               = $em;
        $this->translator       = new Translator();
    }

    /**
     * Initialization of dependencies for used classes from scope of Application cannot be done in constructor as
     * constructor does not have access/has restricted access to container
     */
    public function init() {
    }

}