<?php

class __Mustache_73fb300e917b92df9d95fd2687cccec6 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $newContext = array();

        $buffer .= $indent . '<div class="gallery-item themed">
';
        $buffer .= $indent . '	<div class="img-ph">
';
        $buffer .= $indent . '		<img class="themed ';
        $value = $this->resolveValue($context->find('orientation'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '" src="';
        $value = $this->resolveValue($context->find('img_url'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '/ajax/raster/getTemplatePreview.jpg?template_id=';
        $value = $this->resolveValue($context->find('template_id'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '&preview_profile=gallery_medium_x2';
        // 'default_theme' section
        $value = $context->find('default_theme');
        $buffer .= $this->sectionC5c4ce54ed2f927b8d6532a9a4980329($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '	</div>
';
        // 'favorites' section
        $value = $context->find('favorites');
        $buffer .= $this->section95f0843a5249a555eb79231ca7dc3440($context, $indent, $value);
        $buffer .= $indent . '	<div class="title">';
        $value = $this->resolveValue($context->find('set_title'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</div>
';
        $buffer .= $indent . '	<div class="set-theme-options">
';
        // 'themes.1' section
        $value = $context->findDot('themes.1');
        $buffer .= $this->section88c5df5cc98d90b6d7ede489f70f133f($context, $indent, $value);
        $buffer .= $indent . '	</div>
';
        $buffer .= $indent . '	<div class="gallery-quick-view">
';
        $buffer .= $indent . '		<div class="action-button small quick-view" id="quick_view_';
        $value = $this->resolveValue($context->find('template_id'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '">Quick View</div>
';
        $buffer .= $indent . '	</div>	
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
';

        return $buffer;
    }

    private function sectionC5c4ce54ed2f927b8d6532a9a4980329(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '&theme_id={{default_theme}}';
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
                
                $buffer .= '&theme_id=';
                $value = $this->resolveValue($context->find('default_theme'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section95f0843a5249a555eb79231ca7dc3440(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
	<div class="wishlist-item" id="wishlist_item_{{template_id}}">
		<i class="fa fa-heart-o"><i class="fa fa-heart"></i></i>
	</div>
	';
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
                
                $buffer .= $indent . '	<div class="wishlist-item" id="wishlist_item_';
                $value = $this->resolveValue($context->find('template_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                $buffer .= $indent . '		<i class="fa fa-heart-o"><i class="fa fa-heart"></i></i>
';
                $buffer .= $indent . '	</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9e2875c627d2dbad7c957250bbb623f7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = 'selected';
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
                
                $buffer .= 'selected';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1393a9ac62ceee53ad10a75f228a984e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
			<span id="set_theme_option_{{id}}" class="set-theme-option {{#default}}selected{{/default}}">
				<span style="background-color: #{{color}}"></span></span>
			</span>
		';
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
                
                $buffer .= $indent . '			<span id="set_theme_option_';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '" class="set-theme-option ';
                // 'default' section
                $value = $context->find('default');
                $buffer .= $this->section9e2875c627d2dbad7c957250bbb623f7($context, $indent, $value);
                $buffer .= '">
';
                $buffer .= $indent . '				<span style="background-color: #';
                $value = $this->resolveValue($context->find('color'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"></span></span>
';
                $buffer .= $indent . '			</span>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section88c5df5cc98d90b6d7ede489f70f133f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
		{{#themes}}
			<span id="set_theme_option_{{id}}" class="set-theme-option {{#default}}selected{{/default}}">
				<span style="background-color: #{{color}}"></span></span>
			</span>
		{{/themes}}
	';
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
                
                // 'themes' section
                $value = $context->find('themes');
                $buffer .= $this->section1393a9ac62ceee53ad10a75f228a984e($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
