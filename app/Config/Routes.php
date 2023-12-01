<?php

namespace Config;


$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultController('FileUpload');
$routes->setDefaultController('ExpedienteObra');
$routes->setDefaultController('Capturas');
$routes->setDefaultController('ApiAppController');
$routes->setDefaultController('SiteController');
$routes->setDefaultController('BuscadoresController');
$routes->setDefaultController('ComponentesPartidasController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('/planeacion/(:any)', 'Home::planeacion/$1');
$routes->get('/expedientes', 'ExpedienteObra::expedientes');
$routes->get('ejecutoras', 'ExpedienteObra::ejecutoraexpediente');
$routes->get('iniciocapturas', 'Captura::index');



$routes->get('catalogo/(:num)', 'ExpedienteObra::catalogoXobras/$1');
$routes->get('obrasXejecutora/(:num)', 'ExpedienteObra::obrasXejecutora/$1');
$routes->get('catalogopdf/(:num)', 'ExpedienteObra::pdfcatalogoXObras/$1');
$routes->get('obrasXejecutorapdf/(:num)', 'ExpedienteObra::pdfobrasXEjecutora/$1');


$routes->get('/leyesdocumentos', 'ExpedienteObra::expedientes');

$routes->get('/inicio', 'FileUpload::index');
$routes->get('/documentos', 'FileUpload::documentos');
$routes->get('/ejecutora', 'FileUpload::documentosejecutora');
$routes->get('/secretaria', 'FileUpload::documentossecretaria');
$routes->get('/oficio/(:num)', 'FileUpload::generatePDF/$1');

$routes->match(['get', 'post'], 'FileUpload/upload', 'FileUpload::upload');
$routes->get('/descarga/(:num)', 'FileUpload::qrdocumentos/$1');
$routes->get('/revision1/(:num)', 'FileUpload::correcto/$1');
$routes->get('/revision2/(:num)', 'FileUpload::ilegible/$1');
$routes->post('/revision3/(:num)', 'FileUpload::incorrecto/$1');


//+++++++++++++++++++++++++++++++++++++++++++++
$routes->get('busquedacapturas', 'Capturas::listarcapturas');

//************************************************ */
$routes->get('entregable/reporte_tickets/(:num)', 'Entregable::reportetickets/$1');
$routes->get('entregable/pdf_tickets/(:num)', 'Entregable::pdftickets/$1');
$routes->get('entregable/pdfcapturas/(:num)', 'Entregable::pdfcapturas/$1');
$routes->get('entregable/expediente_obra/(:num)', 'Entregable::pdfGeneralentregable/$1');
$routes->get('entregable/expediente_ejecutoras/(:num)', 'Entregable::pdfEjecutoras/$1');
$routes->get('entregable/expediente_categoria/(:num)', 'Entregable::pdfEntregable/$1');


//****************************************WEB SERVICE ********************************************* */

$routes->post('create', "ApiAppController::create");
//$routes->match(['get', 'post'], "login", "ApiAppController::login");
$routes->post('login', 'ApiAppController::loginUser');
$routes->post('blog', 'ApiAppController::uploadfile');
$routes->get('componente/agregar_componente', 'ComponentesPartidasController::Agregar_Componente');
//$routes->get('componente/agregado', 'ComponentesPartidasController::registrar');
$routes->match(['get', 'post'], 'componente/agregado', 'ComponentesPartidasController::registrar');


//$routes->post('user-login','ApiAppController::userLogin');




if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
