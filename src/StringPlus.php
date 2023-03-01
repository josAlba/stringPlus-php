<?php

namespace Josalba\String;

use Josalba\String\GetValues\AddFirstWithValue;
use Josalba\String\GetValues\AddLastWithValue;
use Josalba\String\GetValues\CompareValue;
use Josalba\String\GetValues\ConcatValue;
use Josalba\String\GetValues\OrValue;
use Josalba\String\GetValues\RemoveSpacesValue;
use Josalba\String\GetValues\RemoveTagsValue;
use Josalba\String\GetValues\ReplaceValue;
use Josalba\String\GetValues\ReplaceWithCallbackValue;
use Josalba\String\GetValues\TrimValue;

final class StringPlus
{
    private string $result;

    /**
     * @param string|null $original
     */
    public function __construct(?string $original)
    {
        $this->result = $original ?? '';
    }

    public function __toString(): string
    {
        return $this->result;
    }

    public static function create(?string $original): self
    {
        return new self($original);
    }

    /**
     * @param string|null ...$originals
     *
     * @return static
     */
    public static function ors(?string ...$originals): self
    {
        $stringPlus = new self(null);

        foreach ($originals as $original) {
            if (empty($original) || !is_string($original)) {
                continue;
            }

            $stringPlus->result = $original;

            break;
        }

        return $stringPlus;
    }

    public function getLength(): int
    {
        return strlen($this->result);
    }

    public function equals(?string $value): bool
    {
        return CompareValue::equals($this->result, $value);
    }

    public function toMd5(): string
    {
        return md5($this->result);
    }

    public function or(?string $value): self
    {
        $this->result = OrValue::getValue($this->result, $value);

        return $this;
    }

    public function concat(?string $value, string $separator = ' '): self
    {
        $this->result = ConcatValue::getValue($this->result, $value, $separator);

        return $this;
    }

    public function trim(): self
    {
        $this->result = TrimValue::getValue($this->result);

        return $this;
    }

    public function removeSpaces(): self
    {
        $this->result = RemoveSpacesValue::getValue($this->result);

        return $this;
    }

    public function addFirstWith(string $value): self
    {
        $this->result = AddFirstWithValue::getValue($this->result, $value);

        return $this;
    }

    public function addLastWith(string $value): self
    {
        $this->result = AddLastWithValue::getValue($this->result, $value);

        return $this;
    }

    public function removeTags(): self
    {
        $this->result = RemoveTagsValue::getValue($this->result);

        return $this;
    }

    /**
     * @param string|array<string> $searchValue
     * @param string|array<string> $replaceValue
     *
     * @return $this
     */
    public function repalce($searchValue, $replaceValue): self
    {
        $this->result = ReplaceValue::getValue($this->result, $searchValue, $replaceValue);

        return $this;
    }

    /**
     * @param array<string> $tags
     * @param callable $callback
     *
     * @return self
     */
    public function remplaceWithCallback(array $tags, callable $callback): self
    {
        $this->result = ReplaceWithCallbackValue::getValue($this->result, $tags, $callback);

        return $this;
    }
}