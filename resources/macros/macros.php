<?php

/*
 * Para utilizar esses macros é necessário possuir o laravelHtmlCollective
 */

\Html::macro('formGroup', function ($field, $label, $errors, $classes = '') {
    $class_erro = $errors->has($field) ? 'has-error' : '';
    $classes.= " form-control";
    $string = "<div class=\"form-group $class_erro \">";
    $string .= \Form::label($field, $label, ['class' => 'control-label']);
    $string .= \Form::text($field, null, ['class' => $classes]);
    if ($class_erro):
        $string .= "<span class='help-block'><strong>{$errors->first($field)}</strong></span>";
    endif;

    $string .= "</div>";

    return $string;
});

\Html::macro('formGroupNumber', function ($field, $label, $errors, $classes = '') {
    $class_erro = $errors->has($field) ? 'has-error' : '';
    $classes.= " form-control";
    $string = "<div class=\"form-group $class_erro \">";
    $string .= \Form::label($field, $label, ['class' => 'control-label']);
    $string .= \Form::number($field, null, ['class' => $classes,'placeholder'=>$label]);
    if ($class_erro):
        $string .= "<span class='help-block'><strong>{$errors->first($field)}</strong></span>";
    endif;

    $string .= "</div>";

    return $string;
});

\Html::macro('formGroupDate', function ($field, $label, $errors, $classes = '') {
    $class_erro = $errors->has($field) ? 'has-error' : '';
    $classes.= " date form-control";
    $string = "<div class=\"form-group $class_erro \">";
    $string .= \Form::label($field, $label, ['class' => 'control-label']);
    $string .= \Form::text($field, null, ['class' => $classes]);
    if ($class_erro):
        $string .= "<span class='help-block'><strong>{$errors->first($field)}</strong></span>";
    endif;

    $string .= "</div>";

    return $string;
});

\Html::macro('formGroupSelect', function ($field, $array,$label, $errors, $classes = '',$datasets=[]) {
    
    $class_erro = $errors->has($field) ? 'has-error' : '';
    $classes.= " form-control";
    $string = "<div class=\"form-group $class_erro \">";
    $string .= \Form::label($field, $label, ['class' => 'control-label']);
    $string .= \Form::select($field, $array,null, ['class' => $classes,'data-placeholder'=>"-Selecione-",'placeholder' => '--Selecione--'],$datasets);
    if ($class_erro):
        $string .= "<span class='help-block'><strong>{$errors->first($field)}</strong></span>";
    endif;

    $string .= "</div>";

    return $string;
});

\Html::macro('selectMultiple', function ($field, $array,$label, $errors, $classes = '',$value=null) {
    
    $class_erro = $errors->has($field) ? 'has-error' : '';
    $classes.= " form-control";
    $string = "<div class=\"form-group $class_erro \">";
    $string .= \Form::label($field, $label, ['class' => 'control-label']);
    $string .= \Form::select($field."[]", $array,array(1,3,4), ['multiple'=>'multiple','class' => $classes,'data-placeholder'=>"-Todos-"]);
    if ($class_erro):
        $string .= "<span class='help-block'><strong>{$errors->first($field)}</strong></span>";
    endif;

    $string .= "</div>";

    return $string;
});


\Html::macro('formGroupFlex', function ($options=array()) {
    $field=isset($options['field'])?$options['field']:'';
    $label=isset($options['label'])?$options['label']:'';
    $atributos=isset($options['atributos'])?$options['atributos']:'';
    $errors=isset($options['errors'])?$options['errors']:'';
    $type=isset($options['type'])?$options['type']:'text';
    $value=isset($options['value'])?$options['value']:null;
    $class_erro = $errors->has($field) ? 'has-error' : '';
    if(isset($atributos['class'])):
        $atributos['class'].=' form-control';
     
    else:
        $atributos['class']=' form-control';
    endif;
    
    $string = "<div class=\"form-group $class_erro \">";
    $string .= \Form::label($field, $label, ['class' => 'control-label']);
    $string .= \Form::$type($field, $value, $atributos);
   
    if ($class_erro):
        $string .= "<span class='help-block'><strong>{$errors->first($field)}</strong></span>";
    endif;

    $string .= "</div>";

    return $string;
});

\Html::macro('selectTeste', function ($options=array()) {
    $container="<div>";
    $input="<select name='tal' class='form-control meu_chosen'>";
    $input.="<option data-val='3' value='x'>X</option>";
    $input.="<option data-vale='4' value='y'>Y</option>";
    $input.="</select>";
    return $input;
});




