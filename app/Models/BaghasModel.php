<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class BaghasModel extends Model
{
    protected $table = 'baghas';
    protected $allowedFields = ['produk', 'nisbah_bank', 'nisbah_nsb', 'eq_rate', 'periode'];

    protected $column_order = ['id', 'produk', 'nisbah_bank', 'nisbah_nsb', 'eq_rate', 'periode'];
    protected $column_search = ['produk', 'nisbah_bank', 'nisbah_nsb', 'eq_rate', 'periode'];

    protected $order = [5, 'desc'];
    protected $request;
    protected $db;
    protected $dt;

    public function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        $this->dt = $this->db->table("$this->table b");
    }

    public function getBaghas($periode)
    {
        $this->dt->select('b.*, pd.produk');
        $this->dt->join('produk_dana pd', 'b.produk=pd.kdprd');
        $this->dt->where("DATE_FORMAT(b.periode,'%Y-%m')=", date('Y-m', strtotime($periode)));
        $query = $this->dt->get();
        return $query->getResult();
    }

    private function getDatatablesQuery()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getVar('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getVar('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if ($this->request->getVar('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getVar('order')['0']['column']], $this->request->getVar('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    public function getDatatables()
    {
        $this->getDatatablesQuery();
        $this->dt->select('b.*, pd.produk as nm_produk');
        $this->dt->join('produk_dana pd', 'b.produk=pd.kdprd');
        if ($this->request->getVar('length') != -1)
            $this->dt->limit($this->request->getVar('length'), $this->request->getVar('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }

    public function countFiltered()
    {
        $this->getDatatablesQuery();
        return $this->dt->countAllResults();
    }

    public function countAll()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }
}
