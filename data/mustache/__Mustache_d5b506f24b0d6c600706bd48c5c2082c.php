<?php

class __Mustache_d5b506f24b0d6c600706bd48c5c2082c extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $newContext = array();

        $buffer .= $indent . '<div id="cat_';
        $value = $this->resolveValue($context->find('category_id'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '" class="filter-item category ';
        // 'default' section
        $value = $context->find('default');
        $buffer .= $this->section7dd86a37667cf09a80348bcdfe2caa0c($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '	<a class=\'desc\' href="';
        $value = $this->resolveValue($context->find('url'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '">
';
        $buffer .= $indent . '		';
        $value = $this->resolveValue($context->find('category_title'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '
';
        $buffer .= $indent . '	</a>
';
        $buffer .= $indent . '</div>';

        return $buffer;
    }

    private function section7dd86a37667cf09a80348bcdfe2caa0c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' on ';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' on ';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
