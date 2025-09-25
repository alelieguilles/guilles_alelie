<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 *
 * Automatically generated via CLI.
 */
class UserModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get users with search and pagination
     *
     * @param string $search Search term
     * @param int $limit Number of records per page
     * @param int $offset Offset for pagination
     * @return array
     */
    public function get_users_with_search($search = '', $limit = 10, $offset = 0)
    {
        $sql = "SELECT * FROM {$this->table} WHERE 1=1";

        $params = [];

        if (!empty($search)) {
            $sql .= " AND (last_name LIKE ? OR first_name LIKE ? OR email LIKE ?)";
            $search_param = "%{$search}%";
            $params[] = $search_param;
            $params[] = $search_param;
            $params[] = $search_param;
        }

        $sql .= " ORDER BY id DESC LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;

        return $this->raw($sql, $params);
    }

    /**
     * Get total count of users with optional search
     *
     * @param string $search Search term
     * @return int
     */
    public function get_total_users($search = '')
    {
        $sql = "SELECT COUNT(*) as total FROM {$this->table} WHERE 1=1";

        $params = [];

        if (!empty($search)) {
            $sql .= " AND (last_name LIKE ? OR first_name LIKE ? OR email LIKE ?)";
            $search_param = "%{$search}%";
            $params[] = $search_param;
            $params[] = $search_param;
            $params[] = $search_param;
        }

        $result = $this->raw($sql, $params);
        return $result[0]['total'] ?? 0;
    }
}
