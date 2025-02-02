<?php

/**
 * Generate XML document based on child object properties.
 *
 * @author Wojciech Brozyna <http://vobro.systems>
 * @license https://github.com/200MPH/tnt/blob/master/LICENCE MIT
 */

namespace thm\tnt_ec\service\ShippingService\entity;

use thm\tnt_ec\MyXMLWriter;

abstract class AbstractXml
{
    
   /**
     * @var MyXMLWriter
     */
    protected $xml;
 
    /**
     * Initialise object
     */
    public function __construct()
    {
        $this->xml = new MyXMLWriter();
        $this->xml->openMemory();
        $this->xml->setIndent(true);
    }
    
    /**
     * Flush XML memory when destruct object
     */
    public function __destruct()
    {
        try {
            if($this->xml instanceof MyXMLWriter) {
                $this->xml->flush();
            }
        } catch (\Throwable $e) {
            // Do nothing
        }
    }
    
    /**
     * Get entire XML as a string
     *
     * @return string
     */
    public function getAsXml()
    {
        
        return trim($this->xml->flush(false));
    }    
}
