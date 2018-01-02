<?php
/**
 * Available Tokens:
 *  {expression} includes parentheses, e.g ('user')
 *  {expr} without parentheses, e.g 'user'
 *  {var} variable name, e.g user
 */

use View5\Template;
use View5\Token\Expression as Expr;

return [
    'auth' => '<?php ${var} = $this->plugin({expr}); if (${var}->authenticated()) : ?>',
    'endAuth' => '<?php endif; ?>',
    /*'auth' => function(string $expression, Template $template) : string {
        $var = Expr::var($expression); $plugin = Expr::expr($expression);
        return '<?php $' . $var . ' = $this->plugin(' . $plugin . '); if ($' . $var . '->authenticated()) : ?>';
    },*/
];
