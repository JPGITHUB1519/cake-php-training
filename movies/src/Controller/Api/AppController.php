<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Api;


use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // allow CORS
        $this->response->header('Access-Control-Allow-Origin','*');
    }

    public function setRestResponse($data, $status="ok", $message=null)
    {
        $this->set([
            'status' => $status,
            'data' => $data,
            'message' => $message,
            '_serialize' => ['status', 'data', 'message']
        ]);
    }

    /**
      * function to filter a query by the http query strings parameters
      * render its content if succesfull else show an error message
      *
      * @param Query $myArgument lazy loaded query to be filter
      * @param Array list of valid filters in odery to filter the query
      * @return void -> set a json response
      */
    public function filterByQueryStrings($query, $validFilters) {
        $filters = $this->request->getQuery();
        $invalidFilters = [];
        foreach($filters as $key => $value) {
            if (in_array($key, $validFilters)) {
                $query = $query->where([$key => $value]);
            } else {
                $invalidFilters[] = $key;
            }
        }

        if (empty($invalidFilters)) {
            $this->setRestResponse($query);
        } else {
            $errorMessage = implode(",", $invalidFilters);
            $this->setRestResponse([], 'fail', $errorMessage . self::INVALID_PARAMETERS_MESSAGE);
        }
    }
}
