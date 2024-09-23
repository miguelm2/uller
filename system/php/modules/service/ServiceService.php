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
            $cont = 0;
            foreach ($services as $service) {
               if ($service->getCantidad() == 0) {
                  $cont++;
               }
               $imagen = $service->getEquipoTipoDTO()->getImagen();
               $html_aux .= '<h6 class="text-black">' . $service->getTipoServicioDTO()->getNombre() . '</h6>';
               $html_aux .= '<p class="text-black"><strong>Cantidad:</strong> ' . $service->getCantidad() . '</p><hr>';
            }
            if ($cont < 4) {
               $html .= Elements::cardsTypeEquipment($equipo, $imagen, $html_aux);
            }
         }
         return $html;
      } catch (\Exception $e) {
         throw new Exception($e->getMessage());
      }
   }
   public static function getServiceByRequestAddService($id_solicitud)
   {
      try {
         $id_solicitud = parent::limpiarString($id_solicitud);
         $modelResponse = Servicio::listServiceByRequest($id_solicitud);
         $html = '';
         foreach ($modelResponse as $equipo => $services) {
            $html_aux = '<table class="table table-bordered "><tbody>';
            $imagen =  '';
            foreach ($services as $service) {
               $imagen = $service->getEquipoTipoDTO()->getImagen();

               $html_aux .= '<tr>
                                 <td><input type="number" class="form-control" name="' . $service->getId_servicio() . '" placeholder="Cantidad" value="' . $service->getCantidad() . '"></td>
                                 <td>' . $service->getTipoServicioDTO()->getNombre() . '</td>
                              </tr>';
            }
            $html_aux .= '</tbody></table>';
            $html .= Elements::cardsTypeEquipment($equipo, $imagen, $html_aux);
         }
         return $html;
      } catch (\Exception $e) {
         throw new Exception($e->getMessage());
      }
   }
   public static function listServiceByRequest($id_solicitud)
   {
      try {
         $id_solicitud = parent::limpiarString($id_solicitud);
         $listService = Servicio::listServiceByRequestOnly($id_solicitud);
         return $listService;
      } catch (\Exception $e) {
         throw new Exception($e->getMessage());
      }
   }
   public static function setService($id_servicio, $cantidad)
   {
      try {
         $id_servicio = parent::limpiarString($id_servicio);
         $cantidad = parent::limpiarString($cantidad);
         $response = Servicio::setService($id_servicio, $cantidad);
         return $response;
      } catch (\Exception $e) {
         throw new Exception($e->getMessage());
      }
   }
   public static function getServiceByRequestTech($id_solicitud)
   {
      try {
         $id_solicitud = parent::limpiarString($id_solicitud);
         $modelResponse = Servicio::listServiceByRequest($id_solicitud);
         $html = '';
         foreach ($modelResponse as $equipo => $services) {
            foreach ($services as $service) {
               if ($service->getCantidad() != 0) {
                  $html .= '<tr>';
                  $html .= '<td>' . $service->getSolicitudDTO()->getUsuarioDTO()->getId_usuario() . '</td>';
                  $html .= '<td>' . $service->getSolicitudDTO()->getUsuarioDTO()->getNombre() . '</td>';
                  $html .= '<td>' . $service->getTipoServicioDTO()->getNombre() . '</td>';
                  $html .= '<td>' . $service->getCantidad() . '</td>';
                  $html .= '<td>' . $service->getFecha_registro() . '</td>';
                  $html .= '<td>' . Elements::crearBotonVer("service", $service->getId_servicio()) . '</td>';
                  $html .= '</tr>';
               }
            }
         }
         return $html;
      } catch (\Exception $e) {
         throw new Exception($e->getMessage());
      }
   }
   public static function getService($id_servicio)
   {
      try {
         $id_servicio = parent::limpiarString($id_servicio);
         $servicioDTO = Servicio::getService($id_servicio);
         return $servicioDTO;
      } catch (\Exception $e) {
         throw new Exception($e->getMessage());
      }
   }
}
