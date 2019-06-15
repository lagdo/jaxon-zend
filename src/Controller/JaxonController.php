<?php

namespace Jaxon\Zend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Jaxon\Zend\Controller\Plugin\JaxonPlugin;

class JaxonController extends AbstractActionController
{
    /**
     * @var \Jaxon\Zend\Controller\Plugin\JaxonPlugin
     */
    protected $jaxon;

    /**
     * The Jaxon Controller constructor
     *
     * The parameter is automatically populated by Zend.
     *
     * @param JaxonPlugin $jaxon
     */
    public function __construct(JaxonPlugin $jaxon)
    {
        $this->jaxon = $jaxon;
    }

    /**
     * Callback before processing a Jaxon request.
     *
     * @param object            $instance               The Jaxon class instance to call
     * @param string            $method                 The Jaxon class method to call
     * @param boolean           $bEndRequest            Whether to end the request or not
     *
     * @return void
     */
    public function beforeRequest($instance, $method, &$bEndRequest)
    {
    }

    /**
     * Callback after processing a Jaxon request.
     *
     * @param object            $instance               The Jaxon class instance called
     * @param string            $method                 The Jaxon class method called
     *
     * @return void
     */
    public function afterRequest($instance, $method)
    {
    }

    /**
     * Process a Jaxon request.
     *
     * The HTTP response is automatically sent back to the browser
     *
     * @return void
     */
    public function indexAction()
    {
        $this->jaxon->callback()->before(function ($instance, $method, &$bEndRequest) {
            $this->beforeRequest($instance, $method, $bEndRequest);
        });
        $this->jaxon->callback()->after(function ($instance, $method) {
            $this->afterRequest($instance, $method);
        });

        // Process the Jaxon request
        if($this->jaxon->canProcessRequest())
        {
            $this->jaxon->processRequest();
            return $this->jaxon->httpResponse();
        }
    }
}
