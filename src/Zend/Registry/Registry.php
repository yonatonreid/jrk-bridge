<?php
declare(strict_types=1);

namespace Bridge\Zend\Registry;


use JetBrains\PhpStorm\Pure;
use Zend_Exception;
use Zend_Registry;

class Registry extends Zend_Registry
{
    /**
     * Registry object provides storage for shared objects.
     * @var Registry
     */
    private static Registry $registry;

    /**
     * Retrieves the default registry instance.
     *
     * @return Registry
     * @throws Zend_Exception
     */
    public static function getInstance(): Registry
    {
        if (static ::$registry === null) {
            static ::init();
        }

        return static ::$registry;
    }

    /**
     *
     * @return Registry
     * @throws Zend_Exception
     */
    public static function init(): Registry
    {
        if (static ::$registry === null) {
            parent ::setClassName(static::class);
            static ::$registry = new static();
        }
        return static ::$registry;
    }

    public function fetch(string $key): mixed
    {
        if (!$this -> has($key)) {
            return false;
        }
        return $this -> offsetGet($key);
    }

    public function all(): array
    {
        return $this -> getArrayCopy();
    }

    /**
     * @param string $key
     * @param $value
     * @throws RegistryKeyAlreadyExistsException
     */
    public function add(string $key, $value)
    {
        if ($this -> has($key)) {
            throw new RegistryKeyAlreadyExistsException("Registry Key $key already exists");
        }
        $this -> offsetSet($key, $value);
    }

    #[Pure] public function has(string $key): bool
    {
        return $this -> offsetExists($key);
    }

    public function delete(string $key): void
    {
        $this -> offsetUnset($key);
    }

    /**
     * @return array
     * @throws Zend_Exception
     */
    public static function getValues(): array
    {
        return self ::getInstance() -> all();
    }

    /**
     * @return array
     * @throws Zend_Exception
     */
    public static function flush(): array
    {
        return self ::getInstance() -> exchangeArray([]);
    }

    /**
     * @return int
     * @throws Zend_Exception
     */
    public static function size(): int
    {
        return self ::getInstance() -> count();
    }

    /**
     * @param string $key
     * @throws RegistryKeyNotExistsException
     */
    public static function remove(string $key): void
    {
        if (static ::contains($key)) {
            parent ::getInstance() -> offsetUnset($key);
        } else {
            static ::throwRegistryKeyNotExistsException($key);
        }
    }

    /**
     * @param string $key
     * @param $data
     * @throws RegistryKeyAlreadyExistsException
     */
    public static function store(string $key, $data): void
    {
        if (self ::contains($key)) {
            self ::throwRegistryKeyAlreadyExistsException($key);
        }
        self ::set($key, $data);
    }

    public static function contains(string $key): bool
    {
        if (parent ::isRegistered($key)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $key
     * @throws RegistryKeyNotExistsException
     */
    private static function throwRegistryKeyNotExistsException(string $key): void
    {
        throw new RegistryKeyNotExistsException("Registry Key $key does not exist");
    }

    /**
     * @param string $key
     * @throws RegistryKeyAlreadyExistsException
     */
    private static function throwRegistryKeyAlreadyExistsException(string $key): void
    {
        throw new RegistryKeyAlreadyExistsException("Registry Key $key already exists");
    }
}