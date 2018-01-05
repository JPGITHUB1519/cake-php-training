<?php
namespace App\Controller;

class BattlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    const INVALID_PARAMETERS_MESSAGE = " is/are invalids parameters";

    /**
      * function to filter a query by the http query strings parameters
      * render its content if succesfull else show an error message
      *
      * @param Query $myArgument lazy loaded query to be filter
      * @param Array list of valid filters in odery to filter the query
      * @return void -> set a json response
      */
    private function filterByQueryStrings($query, $validFilters) {
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

    public function index()
    {
        $validFilters = ['date'];
        $battles = $this->Battles->find('all');
        $battles = $this->filterByQueryStrings($battles, $validFilters);
    }

    public function view($id)
    {
        $battle = $this->Battles->get($id);
        $this->setRestResponse($battle);
    }
}
