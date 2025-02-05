<?php


namespace mdao\QueryOrmServer\Entities;

use mdao\QueryOrmServer\Contracts\OrmEntityContract;

class OrmEntity implements OrmEntityContract
{
    /**
     * @var array
     */
    protected $filter = [];

    /**
     * @var array
     */
    protected $whereOr = [];

    /**
     * @var string|null
     */
    protected $orderBy;
    /**
     * @var string|null
     */
    protected $sortedBy;
    /**
     * @var int
     */
    protected $page;
    /**
     * @var int
     */
    protected $pageSize;

    /**
     * @var string
     */
    protected $select = '';

    /**
     * OrmEntity constructor.
     * @param array $filter
     * @param string|null $orderBy
     * @param string|null $sortedBy
     * @param int|null $page
     * @param int|null $pageSize
     * @param string $select
     * @param array $whereOr
     */
    public function __construct(
        array $filter = [],
        string $orderBy = null,
        string $sortedBy = null,
        ?int $page = null,
        ?int $pageSize = null,
        string $select = '',
        array $whereOr = []
    ) {
        $this->filter = $filter;
        $this->whereOr = $whereOr;
        $this->orderBy = $orderBy;
        $this->sortedBy = $sortedBy;
        $this->page = $page;
        $this->pageSize = $pageSize;
        $this->select = $select;
    }

    /**
     * 根据规则创建一个新的实体
     * @param $attributes
     * @return static
     */
    public static function createEntity($attributes)
    {
        $filter = $attributes['filter'] ?? [];
        $orderBy = $attributes['order_by'] ?? null;
        $sortedBy = $attributes['sorted_by'] ?? null;
        $page = $attributes['page'] ?? null;
        $pageSize = $attributes['page_size'] ?? null;
        $select = $attributes['select'] ?? '';
        $whereOr = $attributes['where_or'] ?? [];
        return new static($filter, $orderBy, $sortedBy, $page, $pageSize, $select, $whereOr);
    }

    /**
     * @return array
     */
    public function getFilter(): array
    {
        return $this->filter;
    }

    /**
     * @param array $filter
     */
    public function setFilter(array $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * @return string|null
     */
    public function getOrderBy(): ?string
    {
        return $this->orderBy;
    }

    /**
     * @param int $orderBy
     */
    public function setOrderBy(int $orderBy): void
    {
        $this->orderBy = $orderBy;
    }

    /**
     * @return string|null
     */
    public function getSortedBy(): ?string
    {
        return $this->sortedBy;
    }

    /**
     * @param int $sortedBy
     */
    public function setSortedBy(int $sortedBy): void
    {
        $this->sortedBy = $sortedBy;
    }

    /**
     * @return int|null
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * @return int|null
     */
    public function getPageSize(): ?int
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize): void
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return string
     */
    public function getSelect(): string
    {
        return $this->select;
    }

    /**
     * @param mixed $select
     */
    public function setSelect($select): void
    {
        $this->select = $select;
    }

    public function getWhereOr(): array
    {
        return $this->whereOr;
    }

    public function setWhereOr(array $whereOr): void
    {
        $this->whereOr = $whereOr;
    }
}
