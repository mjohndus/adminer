<?php

namespace AdminNeo;

class Server
{
	/** @var array */
	private $params;

	/** @var ?string */
	private $key;

	public function __construct(array $params, ?string $key = null)
	{
		$this->params = $params;
		$this->key = $key;
	}

	public function getKey(): string
	{
		return $this->key ?? substr(md5($this->getDriver() . $this->getServer()), 0, 8);
	}

	public function getDriver(): string
	{
		return $this->params["driver"];
	}

	public function getServer(): string
	{
		return $this->params["server"] ?? "";
	}

	public function getDatabase(): string
	{
		return $this->params["database"] ?? "";
	}

	public function getName(): string
	{
		return $this->params["name"] ?? $this->params["server"] ?? "";
	}

	public function getUsername(): string
	{
		return $this->params["username"] ?? "";
	}

	public function getPassword(): string
	{
		return $this->params["password"] ?? "";
	}

	public function hasCredentials(): bool
	{
		return $this->getUsername() != "" || $this->getPassword() != "";

	}

	public function getConfigParams(): array
	{
		$params = $this->params["config"] ?? [];

		$globalOnlyParams = ["servers"];
		foreach ($globalOnlyParams as $param) {
			if (isset($params[$param])) {
				unset($params[$param]);
			}
		}

		return $params;
	}
}
