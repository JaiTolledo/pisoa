<?php

namespace App\Controllers;

ini_set('memory_limit', '-1');
use DateTime;

class Home extends BaseController
{
    private $universoModel;
    public function __construct()
    {
        $this->universoModel = model('UniversoModel');
    }
    public function index()
    {
      
    }
    public function planeacion($filter = '')
    {
        return false;
        $data["title"] = "Planeación";
        $data["active_menu_header"] = $filter;
        $data["filter_default"] = $filter;
        $data["filters"] = $this->universoModel->getFiltersMin('planeacion');

        $data["municipios"] = $this->universoModel->getMunicipios();        
        $data["catalogo_vertientes"] = $this->universoModel->getCatalogoVertientes();
        $data["catalogo_carteras"] = $this->universoModel->getCatalogoCarteras();
        $data["catalogo_referentes"] = $this->universoModel->getCatalogoReferentes();
        $data["catalogo_financiamientos"] = $this->universoModel->getCatalogoFinanciamientos();
        $data["catalogo_compromisos"] = $this->universoModel->getCatalogoCompromisos();

        $data["data"] = $this->universoModel->getGraficaByFilter($filter);
        $data["colors"] = ["#F44C63","#0098D4","#8C2784","#00B0A6","#FFD400","#5884C4","#F98927","#59B038","#285C4D","#B38E5D","#9D2449"];
        $data["detail_filter"] = $this->universoModel->getDetailFilter($filter);
        return view('portada/portada_planeacion', $data);
    }
}
