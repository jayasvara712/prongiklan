<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        return redirect()->to(site_url('login'));
    }

    public function login()
    {
        if (session('id') && session('role') == 'admin') {
            return redirect()->to(site_url('dashboard'));
        } else if (session('id') && session('role') == 'user') {
            return redirect()->to(site_url('halaman'));
        }
        return view('auth/login');
    }

    public function loginProcess()
    {

        $post = $this->request->getPost();
        $query = $this->db->table('user')->getWhere(['email' => $post['email']]);
        $tes['asd'] = ['email' => $post['email'], 'mode' => 'register'];
        $user = $query->getRow();
        if ($user) {
            if (password_verify($post['password'], $user->password)) {

                //cookie
                // if(!empty($post['remember'])) {
                //     setcookie ("loginId", $user->email, time()+ (10 * 365 * 24 * 60 * 60));  
                //     setcookie ("loginPass",$user->password,  time()+ (10 * 365 * 24 * 60 * 60));
                //   } else {
                //     setcookie ("loginId",""); 
                //     setcookie ("loginPass","");
                //   }

                if ($user->status == 1) {

                    if ($user->role == 'admin') {
                        $params = [
                            'id' => $user->id,
                            'role' => $user->role,
                            'nama' => $user->nama,
                        ];
                        session()->set($params);

                        // dd($params, $user->nama);
                        return redirect()->to(site_url('dashboard'));
                    } else if ($user->role == 'user') {
                        $params = [
                            'id' => $user->id,
                            'role' => $user->role,
                            'nama' => $user->nama,
                        ];
                        session()->set($params);

                        // dd($params, $user->nama);
                        return redirect()->to(site_url('halaman/buatiklan'));
                    } else {
                        return redirect()->back()->with('error', 'User Tidak Ditemukan');
                    }
                } else {
                    echo view('auth/verify', $tes);
                }
            } else {
                return redirect()->back()->with('error', 'Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan !');
        }
    }

    public function logout()
    {
        if (session('role') == 'admin') {
            session()->remove('id');
            return redirect()->to(site_url('login'));
        } else if (session('role') == 'user') {
            session()->remove('id');
            return redirect()->to(site_url('halaman'));
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $this->email = \Config\Services::email();
        $post = $this->request->getPost();
        $query = $this->db->table('user')->getWhere(['email' => $post['email']]);
        $user = $query->getRow();

        if (!$user) {
            if ($post['password'] == $post['password2']) {
                $hashenc = rand(0000, 9999);
                $data = [
                    'nama' => $post['nama'],
                    'username' => $post['username'],
                    'password' => password_hash($post['password'], PASSWORD_BCRYPT),
                    'hp' => $post['hp'],
                    'email' => $post['email'],
                    'alamat' => $post['alamat'],
                    'hash' => password_hash($hashenc, PASSWORD_BCRYPT),
                    'role' => 'user',
                ];

                $data2 = [
                    'email' => $post['email'],
                    'mode' => 'register',
                ];
            } else {
                return redirect()->back()->with('error', 'Password tidak sama');
            }
        } else {
            return redirect()->back()->with('error', 'Email Sudah Terdaftar');
        }


        $this->db->table('user')->insert($data);
        $tes['asd'] = $data2;

        //email send
        $this->email->setFrom('littledevtest@gmail.com', 'Prongiklan');
        $this->email->setTo($data['email']);

        $this->email->setSubject('Verifikasi Akun Email Anda');
        $this->email->setMessage('Masukkan kode berikut pada kolom verifikasi, ' . $hashenc);

        if ($this->db->affectedRows() > 0) {
            // return redirect()->to(site_url('verify'))->with('success', 'Silahkan cek email anda untuk melakukan verifikasi !');
            echo view('auth/verify', $tes);
        }

        if (!$this->email->send()) {
            return false;
        } else {
            return true;
            echo view('auth/verify', $tes);
        }

        //end email


    }

    public function reset()
    {
        return view('auth/reset');
    }

    public function resetProses()
    {
        $this->email = \Config\Services::email();
        $builder = $this->db->table('user');
        $post = $this->request->getPost();
        $query = $this->db->table('user')->getWhere(['email' => $post['email']]);
        $user = $query->getRow();
        if ($user) {
            $hashenc = rand(0000, 9999);

            //email send
            $this->email->setFrom('littledevtest@gmail.com', 'Prongiklan');
            $this->email->setTo($post['email']);
            $this->email->setSubject('Verifikasi Reset Password Anda');
            $this->email->setMessage('Masukkan kode berikut pada kolom verifikasi, ' . $hashenc);

            //data
            $data =
                [
                    'hash' => password_hash($hashenc, PASSWORD_BCRYPT),
                ];

            $data2 = [
                'email' => $post['email'],
                'mode' => 'reset',
            ];
            //end data

            //proses
            $builder->where('email', $post['email']);
            $builder->update($data);
            $tes['asd'] = $data2;

            if ($this->db->affectedRows() > 0) {
                // return redirect()->to(site_url('verify'))->with('success', 'Silahkan cek email anda untuk melakukan verifikasi !');
                echo view('auth/verify', $tes);
            }

            if (!$this->email->send()) {
                return false;
            } else {
                return true;
            }
        } else {
            return redirect()->to(site_url('reset'))->with('error', 'Email tidak terdaftar !');
        }
    }

    public function verify()
    {
        return view('auth/verify');
    }


    public function verifyProses()
    {
        // $builder = $this->db->table('user');
        // $post = $this->request->getPost();
        // $hash = $post['code1'].$post['code2'].$post['code3'].$post['code4'];
        // $query = $this->db->table('user')->getWhere(['email' => $post['email']]);
        // $user = $query->getRow();

        // if($user) {
        //     $data = [
        //         'status' => 1,
        //     ];

        //     $builder->where('hash', $hash );
        //     $builder->update($data);
        //     return redirect()->to(site_url('login'))->with('success', 'Verifikasi  Berhasil !')->withInput();
        // } else {
        //     return redirect()->back()->with('error', 'Kode Verifikasi Salah !');
        // }
        $builder = $this->db->table('user');
        $post = $this->request->getPost();
        $mode = $post['mode'];
        $hash = $post['code1'] . $post['code2'] . $post['code3'] . $post['code4'];
        $query = $this->db->table('user')->getWhere(['email' => $post['email']]);
        $user = $query->getRow();

        if ($user) {
            if (password_verify($hash, $user->hash)) {
                if ($mode == 'register') {
                    $data =
                        [
                            'status' => 1,
                        ];

                    $builder->where('email', $post['email']);
                    $builder->update($data);
                    return redirect()->to(site_url('login'))->with('success', 'Verifikasi  Berhasil !');
                } else if ($mode == 'reset') {
                    $data =
                        [
                            'email' => $user->email,
                        ];
                    $tes['asd'] = $data;
                    echo view('auth/resetpw', $tes);
                    // return redirect()->with('success', 'Verifikasi  Berhasil !');
                }
            } else {
                $data2 =
                    [
                        'email' => $post['email'],
                        'mode' => $mode,

                    ];
                $tes['asd'] = $data2;
                echo view('auth/verify', $tes);
                return redirect()->with('error', 'Kode Verifikasi Salah !');
            }
        }
    }

    public function resetpwProses()
    {
        $builder = $this->db->table('user');
        $post = $this->request->getPost();
        $query = $this->db->table('user')->getWhere(['email' => $post['email']]);
        $user = $query->getRow();

        if ($user) {
            if ($post['password'] == $post['password2']) {
                $data =
                    [
                        'password' => password_hash($post['password'], PASSWORD_BCRYPT),
                    ];

                $builder->where('email', $post['email']);
                $builder->update($data);
                return redirect()->to(site_url('login'))->with('success', 'Berhasil Mengganti Password !');
            } else {
                $data2 =
                    [
                        'email' => $post['email'],
                    ];
                $tes['asd'] = $data2;
                echo view('auth/resetpw', $tes);
                return redirect()->with('error', 'Password tidak sama');
            }
        }
    }
}
