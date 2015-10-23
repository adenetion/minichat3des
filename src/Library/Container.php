<?php

namespace Library;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Configuration;
use Doctrine\Common\Cache\ArrayCache as Cache;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\ClassLoader;
use Twig_Loader_Filesystem;
use Twig_Environment;
use Respect\Rest\Router;

/**
 * Description of Container
 *
 * @author adenilton
 */
class Container {
    //put your code here
    
    protected static function getDataBaseParams() {
        $confgFile = __DIR__ . '/../minichat3des.ini';
        if (file_exists($confgFile)) {
            
            $db = parse_ini_file($confgFile);

            $connectionOptions = array(
                'driver' => $db['driver'],
                'host' => $db['host'],
                'user' => $db['user'],
                'password' => $db['password'],
                'dbname' => $db['dbname']
            );
            
            return $connectionOptions;
        } else {
            throw new RuntimeException("DataBase configuration file not found.", 1);
        }
    }
    
    public static function gerEntityManager()
    {
        $loader1 = new ClassLoader('Models', __DIR__ . '/../Models');
        $loader1->register();
        
        $loader2 = new ClassLoader('ModelsProxy', __DIR__ . '/../Models');
        $loader2->register();
        
        //Configuration
        $config = new Configuration();
        $cache = new Cache();
        $config->setQueryCacheImpl($cache);
        $config->setProxyDir(__DIR__ . '/../Models');
        $config->setProxyNamespace('ModelsProxy');
        $config->setEntityNamespaces(array('Models'));
        $config->setAutoGenerateProxyClasses(TRUE);
        
        AnnotationRegistry::registerFile(__DIR__ . "/../../vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php");
        
        $driver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(
            new \Doctrine\Common\Annotations\AnnotationReader(),
            array(__DIR__ . '/../Models')
        );
        
        $config->setMetadataDriverImpl($driver);
        $config->setMetadataCacheImpl($cache);
        
        $dbConf = self::getDataBaseParams();
        
        //getting EntityManager
        $entityManager = EntityManager::create($dbConf, $config);
        
        return $entityManager;
    }
    
    
    /**
     * 
     * @param type $path
     * @return Twig_Loader_Filesystem
     */
    public static function getTwigLoderFileSystem($path)
    {
        return new \Twig_Loader_Filesystem($path);
    }
    
    /**
     * 
     * @param Twig_Environment $loader
     * @param array $conf
     */
    public static function getTwigEnvironment(Twig_Loader_Filesystem $loader, array $conf)
    {
        return new \Twig_Environment($loader, $conf);
    }
    
    /**
     * 
     * @return Router
     */
    public static function getRouter()
    {
        return new \Respect\Rest\Router();
    }
}
