<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Servicio.php';

class ServiceService extends System
{
   public static function getServiceByRequest($id_solicitud)
   {
      try {
         $id_solicitud = parent::limpiarString($id_solicitud);
         $modelResponse = Servicio::listServiceByRequest($id_solicitud);
         $html = '';
         foreach ($modelResponse as $equipo => $services) {
            $html_aux = $imagen =  '';
            foreach ($services as $service) {
               $imagen = $service->getEquipoTipoDTO()->getImagen();
               $html_aux .= '<h6>' . $service->getTipoServicioDTO()->getNombre() . '</h6>';
               $html_aux .= '<p>Cantidad: ' . $service->getCantidad() . '</p><hr>';
            }
            $html .= Elements::cardsTypeEquipment($equipo, $imagen, $html_aux);
         }
         return $html;
      } catch (\Exception $e) {
         throw new Exception($e->getMessage());
      }
   }
}
