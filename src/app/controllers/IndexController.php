<?php

use Phalcon\Mvc\Controller;
use GuzzleHttp\Client;



class IndexController extends Controller
{
    public function indexAction()
    {
        // default action
    }
    public function getU($city, $type)
    {

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.weatherapi.com',
            // You can set any number of default request options.
            'timeout'  => 10.0,
        ]);

        if ($type == "/history.json") {
            $date = "2023-05-05";
            $end = "2023-05-08";
        $end = "/v1" . $type . "?key=0bab7dd1bacc418689b143833220304&q=" . $city . "&dt=" . $date . "&end_dt=" . $end;
            $response = $client->request('GET', $end);
            $res = json_decode($response->getBody(), true);
            return $res;
        } else {
            $end = "/v1" . $type . "?key=0bab7dd1bacc418689b143833220304&q=" . $city . "&dt=" . $date;
            $response = $client->request('GET', $end);
            $res = json_decode($response->getBody(), true);
            return $res;
        }
    }


    public function searchAction()
    {
        $city = $this->request->getPost("city");
        $type = $this->request->getPost("type");

        if ($type == "/current.json") {
            $this->response->redirect("index/current/?city=" . $city . "&&type=" . $type);
        }
        if ($type == "/forecast.json") {
            $this->response->redirect("index/forecast/?city=" . $city . "&&type=" . $type);
        }
        if ($type == "/astronomy.json") {
            $this->response->redirect("index/astronomy/?city=" . $city . "&&type=" . $type);
        }
        if ($type == "/sports.json") {
            $this->response->redirect("index/sports/?city=" . $city . "&&type=" . $type);
        }
        if ($type == "/timezone.json") {
            $this->response->redirect("index/timezone/?city=" . $city . "&&type=" . $type);
        }
        if ($type == "/history.json") {
            $this->response->redirect("index/history/?city=" . $city . "&&type=" . $type);
        }
    }
    public function currentAction()
    {

        $city = $_GET['city'];
        $type = $_GET['type'];

        $u = $this->getU($city, $type);

        $this->view->data = $u;
    }
    public function forecastAction()
    {

        $city = $_GET['city'];
        $type = $_GET['type'];

        $u = $this->getU($city, $type);
        $this->view->data = $u;
    }
    public function astronomyAction()
    {

        $city = $_GET['city'];
        $type = $_GET['type'];

        $u = $this->getU($city, $type);
        $this->view->data = $u;
    }
    public function sportsAction()
    {

        $city = $_GET['city'];
        $type = $_GET['type'];

        $u = $this->getU($city, $type);
        $this->view->data = $u;
    }
    public function timezoneAction()
    {

        $city = $_GET['city'];
        $type = $_GET['type'];

        $u = $this->getU($city, $type);
        $this->view->data = $u;
    }
    public function historyAction()
    {

        $city = $_GET['city'];
        $type = $_GET['type'];
        $u = $this->getU($city, $type);

        $this->view->data = $u;
    }
}
