<?php

namespace AdminNeo;

class Config
{
	public const NavigationSimple = "simple";
	public const NavigationDual = "dual";
	public const NavigationReversed = "reversed";

	public const SelfSource = "self";

	/** @var array */
	private $params;

	/** @var Server[] */
	private $servers = [];

	public function __construct(array $params)
	{
		$this->params = $params; // !compile: custom config

		if (isset($this->params["servers"])) {
			foreach ($this->params["servers"] as $server) {
				$serverObj = new Server($server);
				$this->servers[$serverObj->getKey()] = $serverObj;
			}
		}
	}

	public function getTheme(): string
	{
		return $this->params["theme"] ?? "default";
	}

	public function getColorVariant(): string
	{
		return $this->params["colorVariant"] ?? "blue";
	}

	/**
	 * @return string[]
	 */
	public function getCssUrls(): array
	{
		return $this->params["cssUrls"] ?? [];
	}

	/**
	 * @return string[]
	 */
	public function getJsUrls(): array
	{
		return $this->params["jsUrls"] ?? [];
	}

	public function getNavigationMode(): string
	{
		return $this->params["navigationMode"] ?? self::NavigationSimple;
	}

	public function isNavigationSimple(): bool
	{
		return $this->getNavigationMode() == self::NavigationSimple;
	}

	public function isNavigationDual(): bool
	{
		return $this->getNavigationMode() == self::NavigationDual;
	}

	public function isNavigationReversed(): bool
	{
		return $this->getNavigationMode() == self::NavigationReversed;
	}

	public function isSelectionPreferred(): bool
	{
		return $this->params["preferSelection"] ?? false;
	}

	public function isJsonValuesDetection(): bool
	{
		return $this->params["jsonValuesDetection"] ?? false;
	}

	public function isJsonValuesAutoFormat(): bool
	{
		return $this->params["jsonValuesAutoFormat"] ?? false;
	}

	public function getEnumAsSelectThreshold(): ?int
	{
		if (array_key_exists("enumAsSelectThreshold", $this->params)) {
			return $this->params["enumAsSelectThreshold"] !== null ? (int)$this->params["enumAsSelectThreshold"] : null;
		} else {
			return 5;
		}
	}

	public function getRecordsPerPage(): int
	{
		return (int)($this->params["recordsPerPage"] ?? 50);
	}

	public function isVersionVerificationEnabled(): bool
	{
		return $this->params["versionVerification"] ?? true;
	}

	public function getHiddenDatabases(): array
	{
		return $this->params["hiddenDatabases"] ?? [];
	}

	public function getHiddenSchemas(): array
	{
		return $this->params["hiddenSchemas"] ?? [];
	}

	public function getVisibleCollations(): array
	{
		return $this->params["visibleCollations"] ?? [];
	}

	public function getDefaultDriver(array $drivers): string
	{
		$driver = $this->params["defaultDriver"] ?? null;

		return $driver && isset($drivers[$driver]) ? $driver : key($drivers);
	}

	public function getDefaultPasswordHash(): ?string
	{
		return $this->params["defaultPasswordHash"] ?? null;
	}

	public function getSslKey(): ?string
	{
		return $this->params["sslKey"] ?? null;
	}

	public function getSslCertificate(): ?string
	{
		return $this->params["sslCertificate"] ?? null;
	}

	public function getSslCaCertificate(): ?string
	{
		return $this->params["sslCaCertificate"] ?? null;
	}

	public function getSslTrustServerCertificate(): ?bool
	{
		return $this->params["sslTrustServerCertificate"] ?? null;
	}

	public function getSslEncrypt(): ?bool
	{
		return $this->params["sslEncrypt"] ?? null;
	}

	public function getSslMode(): ?string
	{
		return $this->params["sslMode"] ?? null;
	}

	public function hasServers(): bool
	{
		return isset($this->params["servers"]);
	}

	/**
	 * @return string[]
	 */
	public function getServerPairs(array $drivers): array
	{
		$serverPairs = [];

		foreach ($this->servers as $key => $server) {
			if (isset($drivers[$server->getDriver()])) {
				$serverName = $server->getName();

				$serverPairs[$key] = $drivers[$server->getDriver()] . ($serverName != "" ? " - $serverName" : "");
			}
		}

		return $serverPairs;
	}

	public function getServer(string $serverKey): ?Server
	{
		return $this->servers[$serverKey] ?? null;
	}

	public function applyServer(string $server): void
	{
		$server = $this->getServer($server);
		if (!$server) {
			return;
		}

		$this->params = array_merge($this->params, $server->getConfigParams());
	}
}
