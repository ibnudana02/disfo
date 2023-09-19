<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class BaghasModel extends Model
{
    protected $table = 'baghas';
    protected $allowedFields = ['produk', 'nisbah_bank', 'nisbah_nsb', 'eq_rate', 'periode'];

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
}
