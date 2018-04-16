<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Actionscloseandclone {

    function formObjectOptions($parameters, &$object, &$action, $hookmanager) {
        global $conf, $user, $langs, $object, $hookmanager, $db;
        $langs->load('closeandclone@closeandclone');
        if (in_array('propalcard', explode(':', $parameters['context']))) {
            if ($object->statut != 3 && $object->statut !=0) {
                $url = dol_buildpath('/closeandclone/js/ajax.php', 1);
                print '<script type="text/javascript">';
                print "$(document).ready(function() {
              $('div.fiche div.tabsAction').prepend('<a class=\"butAction\" id=\"closeandclone\" href=\"" . $_SERVER['PHP_SELF'] . '?id=' . $object->id . '&amp;action=clone&amp;object=propal' . "\">" . $langs->trans('CloseandClone') . "</a>');

                            $('#closeandclone').click(function(){
                                $.post( '" . $url . "', { idpropal: '" . $object->id . "'} );
                            });

              //$('div.fiche div.tabsAction').prepend('<a class=\"butAction\" id=\"closeandclone\" href=\"" . $_SERVER['PHP_SELF'] . '?id=' . $object->id . '&amp;action=clone&amp;object=propal' . "\">" . $langs->trans('CloseandClone') . "</a>');

               });
               </script>
                ";
            }
        }
        return 0;
    }

}
