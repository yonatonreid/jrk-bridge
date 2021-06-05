<?php


namespace Bridge\Laminas\Form;


use Laminas\Form\Element;

class Form extends \Laminas\Form\Form
{
    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PUT = 'PUT';
    const METHOD_HEAD = 'HEAD';

    public function postMethod(): void
    {
        $this -> setAttribute('method', static::METHOD_POST);
    }

    public function getMethod(): void
    {
        $this -> setAttribute('method', static::METHOD_GET);
    }

    public function setElementRequired(bool $val, Element $elm): void
    {
        $elm -> setAttribute('required', $val);
    }

    public function setElementId($id, Element $elm): void
    {
        $elm -> setAttribute('id', $id);
    }

    public function setElementClass($clazz, Element $elm): void
    {
        $elm -> setAttribute('class', $clazz);
    }

    public function setElementPlaceholder($placeholder, Element $elm): void
    {
        $elm -> setAttribute('placeholder', $placeholder);
    }
}
