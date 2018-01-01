<?php
/**
 *
 */

use View5\Template;

return [
    'auth' => '<?php ${var} = $this->plugin({expr}); if (${var}->authenticated()) : ?>',
    'endAuth' => '<?php endif; ?>',
    /*'endAuth' => function(string $expression, Template $template) : string {
        return '<?php endif; ?>';
    },*/
];
