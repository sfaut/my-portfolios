<?php

return [
    'store.success' => <<<BUFFER
        Le nouveau portfolio « :name » a bien été créé.
        Vous pouvez maintenant y ajouter des comptes.
        BUFFER,
    'update.success' => 'Les modifications sur le portfolio « :name » ont été enregistrées.',
    'destroy.success' => 'Le portfolio « :name », ses comptes et ses opérations ont été archivés.',
];
