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

use Model\ViewComponent, Model\Translate, Model\Core, Michelf\MarkdownExtra;

$about_dropdown = ViewComponent::dropdown(
    title: Translate::get("about"),
    content: "<small>".(Core::get()["core_about"] ?? "")."</small>",
    id: "information-about-dropdown",
    open: true,
);

$tr_creator = Translate::get("creator");
$tr_name = Translate::get("name");
$tr_version = Translate::get("version");
$tr_date = Translate::get("date");

$sp_version = (Core::get()["core_version"] ?? "")."-".(Core::get()["core_state"] ?? "");
$sp_date = (Core::get()["core_created"] ?? "")." ~ ".(Core::get()["core_updated"] ?? "");
$sp_creator_link = "<a target=\"_blank\" href=\"".(Core::get()["core_creator_link"] ?? "")."\">".(Core::get()["core_creator_name"] ?? "")."</a>";
$sp_core_link = "<a target=\"_blank\" href=\"".(Core::get()["core_link"] ?? "")."\">".(Core::get()["core_name"] ?? "")."</a>";

$core_dropdown_content = <<<HTML
    <div class="flex flex-column gap-6 t-small">
        <div class="flex flex-between gap-8 p-8 b-bottom-1">
            <span>$tr_creator:</span>
            <span>$sp_creator_link</span>
        </div>
        <div class="flex flex-between gap-8 p-8 b-bottom-1">
            <span>$tr_name:</span>
            <span>$sp_core_link</span>
        </div>
        <div class="flex flex-between gap-8 p-8 b-bottom-1">
            <span>$tr_version:</span>
            <span>$sp_version</span>
        </div>
        <div class="flex flex-between gap-8 p-8">
            <span>$tr_date:</span>
            <span>$sp_date</span>
        </div>
    </div>
HTML;

$core_dropdown = ViewComponent::dropdown(
    title: Translate::get("core"),
    content: $core_dropdown_content,
    id: "information-core-dropdown",
    open: true,
);

$social_list = Core::get()["core_social"] ?? [];
$social_dropdown_content = "<div class=\"flex flex-column gap-6 t-small\">";
$i = 0;
foreach($social_list as $social) {
    $social_dropdown_content .= "<div class=\"flex flex-between gap-8 p-8 ". ($i < count($social_list)-1 ? "b-bottom-1" : "")."\">".
        "<span>{$social['social_name']}:</span>".
        "<span><a target=\"_blank\" href=\"{$social['link']}\">{$social['name']}</a></span>".
    "</div>";
    $i++;
}

$social_dropdown_content .= "</div>";

$social_dropdown = ViewComponent::dropdown(
    title: Translate::get("social-networks"),
    content: $social_dropdown_content,
    id: "information-social-dropdown",
    open: true,
);


$license_dropdown_content = "<small>" . (file_exists(RAIZ."/LICENSE") ? nl2br(secureString(file_get_contents(RAIZ."/LICENSE"))) : "License not found") . "</small>";

$license_dropdown = ViewComponent::dropdown(
    title: Translate::get("license"),
    content: $license_dropdown_content,
    id: "information-license-dropdown",
    open: true,
);

$changelog_dropdown_content = "<small>" . MarkdownExtra::defaultTransform(file_exists(RAIZ."/CHANGELOG.md") ? file_get_contents(RAIZ."/CHANGELOG.md") : "CHANGELOG.md not found") . "</small>";

$changelog_dropdown = ViewComponent::dropdown(
    title: Translate::get("changelog"),
    content: $changelog_dropdown_content,
    id: "information-changelog-dropdown",
    open: true,
);

echo ViewComponent::dropdown(
    title: Translate::get("information"),
    content: "<div class=\"flex flex-column gap-8\">" . $about_dropdown . $core_dropdown . $social_dropdown . $license_dropdown . $changelog_dropdown . "</div>",
    id: "information-dropdown",
    open: true,
);