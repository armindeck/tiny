<?php

/*  Licencia de Uso No Transferible                                       */
/**************************************************************************/
/*                        This file is part of:                           */
/*                              Tiny                                      */
/*                 https://github.com/armindeck/tiny                      */
/**************************************************************************/
/* Copyright (c) 2026 Armin Deck                                          */
/*                                                                        */
/* Se concede permiso, de forma gratuita, a cualquier persona para usar,  */
/* modificar y ejecutar el código fuente de este software, incluyendo su  */
/* uso en proyectos comerciales (como monetización por publicidad o       */
/* donaciones).                                                           */
/*                                                                        */
/* Restricciones estrictas:                                               */
/* - No está permitido vender, sublicenciar o distribuir el código        */
/*   fuente —total o parcialmente— con fines de lucro.                    */
/* - No está permitido convertir el código en privativo ni eliminar       */
/*   esta licencia.                                                       */
/* - No está permitido reclamar la autoría del código original.           */
/*                                                                        */
/* Uso permitido:                                                         */
/* - Se permite modificar y usar el código con fines personales,          */
/*   educativos y/o comerciales, siempre que no se venda.                 */
/* - Se permite usar este software como base para otros proyectos,        */
/*   siempre que esta licencia se mantenga.                               */
/*                                                                        */
/* El autor Armin Deck se reserva el derecho de modificar esta            */
/* licencia en futuras versiones del software.                            */
/*                                                                        */
/* EL SOFTWARE SE ENTREGA "TAL CUAL", SIN GARANTÍAS DE NINGÚN TIPO,       */
/* EXPRESAS O IMPLÍCITAS, INCLUYENDO, SIN LIMITACIÓN, GARANTÍAS DE        */
/* COMERCIABILIDAD, IDONEIDAD PARA UN PROPÓSITO PARTICULAR Y NO           */
/* INFRACCIÓN. EN NINGÚN CASO LOS AUTORES SERÁN RESPONSABLES POR          */
/* RECLAMACIONES, DAÑOS U OTRAS RESPONSABILIDADES, YA SEA EN UNA ACCIÓN   */
/* CONTRACTUAL, EXTRACONTRACTUAL O DE OTRO TIPO, DERIVADAS DE O EN        */
/* CONEXIÓN CON EL SOFTWARE, SU USO O OTRO TIPO DE MANEJO.                */
/**************************************************************************/

namespace Model;

use Model\Translate;

class ViewComponent {
  public static function dropdown(string $title = "Title", string $content = "Content", string $id = "dropdown-check", bool $open = false, string $style = "") {
    $checked = $open ? " checked" : "";
    return <<<HTML
      <input type="checkbox" class="dropdown-check" id="$id" $checked/>
      <div class="dropdown" style="$style">
        <label for="$id" class="dropdown--header">
            <div class="icon">
                <i class="fas fa-caret-down"></i>
            </div>
            <div class="text">
                $title
            </div>
        </label>
        <div class="dropdown--content">
          $content
        </div>
      </div>
    HTML;
  }
}

class ViewComponentExtras extends ViewComponent {
  /**
   * @param string $title auto translate
   */
  public static function dropdown_nav_link(string $title = "Title", string $content = "Content", string $id = "dropdown-check", bool $open = false, string $style = "", string $content_first = "", string $content_last = "", array $links = [], bool $nav_div = true) {
    $items_list_html = function($links): string {
      $items = "";
      foreach ($links as $value){
        # Start link
        $items .= "<a href=\"" . ($value['link'] ?? "") . "\">";
        
        # Start Card
        $items .= "<div class=\"dropdown--content__nav--item\">";
        
        # Icon
        $items .= "<div class=\"icon\"><i class=\"" . ($value['icon'] ?? "") ."\"></i></div>";
        
        # Label
        $items .= "<div class=\"text\">" . Translate::get($value['label'] ?? "") . "</div>";
        
        # End Card
        $items .= "</div>";
        
        # End Link
        $items .= "</a>";
      }
      return $items;
    };

    $render_items_nav = fn($items) => <<<HTML
      <div class="dropdown--content__nav flex-column-mobil">
        $items
      </div>
    HTML;
  
    $items = $items_list_html($links);

    return self::dropdown(
      title: Translate::get($title),
      content: $content_first . $content . ($nav_div ? $render_items_nav($items) : $items) . $content_last,
      id: $id,
      open: $open,
      style: $style
    );
  }
}