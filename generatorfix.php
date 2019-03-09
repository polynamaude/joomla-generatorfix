<?php
/**
 * @copyright Copyright (C) 2017-2018 Polyna-Maude R.-Summerside
 * @license No distribution allowed
 * @author Polyna-Maude Racicot-Summerside
 * @package Generator Fix PlugIn
 * @subpackage Main entry file
 * @version 0.6
 */

// No direct access
defined('_JEXEC') or die;

/***
 * Generator Fix Plugin
 * Remove Joomla signature from html output
 * 
 * @since 0.1
 */

class PlgSystemGeneratorFix extends \Joomla\CMS\Plugin\CMSPlugin
{
    
    /**
     * @method onBeforeCompileHead
     * @return boolean
     */
    
    public function onBeforeCompileHead()
    {   
        /**
         * Use $app to test for front-end
         * @var \Joomla\CMS\Application\CMSApplication $app
         */
        $app = \Joomla\CMS\Factory::getApplication();
        
        /**
         * Test for front-end if not return
         */
        
        if ($app->isAdmin())
        {
            return true;
        }
        
        /**
         * Use $doc to find document type
         * @var \Joomla\CMS\Document\Document $doc
         */
        $doc = \Joomla\CMS\Factory::getDocument();
        
        /**
         * If document is html continue else return
         */
        if ($doc->getType() !== 'html')
        {
            return true;
        }
        
        /**
         * Check to see if you generate a random string
         */
        
        if ($this->params->get('generateempty')=='1')
        {
            $doc->setGenerator(' ');
            return true;
        }
        
        else 
        {
            $doc->setGenerator(htmlspecialchars($this->params->get('generatorstring')));
        }
    }
}