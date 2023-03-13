# stringPlus-php

Esta clase proporciona una variedad de métodos para facilitar la transformación de strings

## Methods

* <b>__toString</b>: Retorna el string resultante.
* <b>in</b>: comprueba si existe en la cadena enviada como parámetro.
* <b>getLength</b>: Longitud de la cadena.
* <b>equals</b>: Compara con otra cadena.
* <b>toMd5</b>: Codifica en md5.
* <b>or</b>: Cambia la cadena si es empty por otra elegible.
* <b>concat</b>: Concatena cadenas si no son empty.
* <b>trim</b>
* <b>removeSpaces</b>: Elimina espacios.
* <b>addFirstWith</b>: Concatena una cadena al inicio.
* <b>addLastWith</b>: Concatena una cadena al final.
* <b>removeTags</b>: Elimina lenguajes de etiqueta.
* <b>repalce</b>: Remplaza una cadena de texto dentro del resultado.
* <b>remplaceWithCallback</b>: Remplaza una cadena de texto dentro del resultado por callback.
* <b>inArray</b>: Comprueba si existe esta cadena en un array.
* <b>isKeyInArray</b>: Comprueba si esta cadena es clave en un array.
* <b>isEmpty</b>: Comprueba si es vacía.

## Example

### New

```php
 $text = StringPlus::create('Lorem Ipsum');
```

Result

```php
 'Lorem Ipsum'
```

### Or

#### Por creación

```php
 $text = StringPlus::ors('',null,'Lorem Ipsum','','is');
```

Result

```php
 'Lorem Ipsum'
```

#### Por método

```php
 $text = StringPlus::create('')
    ->or(null);
    ->or('Lorem Ipsum');
    ->or('');
    ->or('is');
```

Result

```php
 'Lorem Ipsum'
```

### Concat

```php
 $text = StringPlus::create('Lorem Ipsum')
            ->concat('')
            ->concat(null)
            ->concat('is simply dummy text of the printing and typesetting industry.')
            ->concat('');
```

Result

```php
 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
```

### In

```php
 $isIn = StringPlus::create('Lorem Ipsum')->in('Ipsum');

 if($isIn === true){
    echo "OK.";
 }
```

### GetLength

```php
 $length = StringPlus::create('Lorem Ipsum')->getLength();
```

### Equals

```php
 $isEquals = StringPlus::create('Lorem Ipsum')->equals('Lorem Ipsum');

 if($isIn === true){
    echo "Es igual.";
 }
```

### ToMd5

```php
 $md5 = StringPlus::create('Lorem Ipsum')->toMd5();
```