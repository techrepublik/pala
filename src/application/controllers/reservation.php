<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reservation extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->load->model('db_table');
	}

	function index()
	{
		if ($message = $this->session->flashdata('message')) {
			$message = $this->session->flashdata('message');
			$module['content'] = $this->load->view('auth/general_message', array('message' => $message), TRUE);
			$module['title'] = 'Notification';
			$module['menu'] = $this->load->view('menu/default', NULL, TRUE);
			$this->load->view('template/base-template', $module);
		} else {
		    $this->form_validation->set_rules('arrival', 'Arrival field', 'trim|required');
            $this->form_validation->set_rules('departure', 'Departure field', 'trim|required');
            $this->form_validation->set_rules('fname', 'Last name', 'trim|required');
            $this->form_validation->set_rules('lname', 'Last name', 'trim|required');
            $this->form_validation->set_rules('mname', 'Middle name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('contact_no', 'Contact Number', 'trim|required');
            $this->form_validation->set_rules('total_amount', 'Total amount', 'required');

		    $room_types = $this->db->get('room_types_db');
            foreach($room_types->result() as $type)
            {
                $avalaible_rooms_cnt = $this->db->where(array('type_id' => $type->id, 'status' => 0))->from('rooms')->count_all_results();
                $type->count = $avalaible_rooms_cnt;
            }

            if ($this->form_validation->run()) {
                $my_reservations = new Db_table('my_reservations');
	            $my_reservations->generate_fields();

                $arrival = $this->form_validation->set_value('arrival');
                $departure = $this->form_validation->set_value('departure');
                $fname = $this->form_validation->set_value('fname');
                $lname = $this->form_validation->set_value('lname');
                $mname = $this->form_validation->set_value('mname');
                $email = $this->form_validation->set_value('email');
                $contact_no = $this->form_validation->set_value('contact_no');
                $room_reservations = $this->input->post('room_reservations');
                $total_amount = $this->form_validation->set_value('total_amount');

                $my_reservations->check_in = date('Y-m-d H:i:s', strtotime($arrival));
                $my_reservations->check_out = date('Y-m-d H:i:s', strtotime($departure));
                $my_reservations->last_name = $lname;
                $my_reservations->first_name = $fname;
                $my_reservations->middle_name = $mname;
                $my_reservations->email = $email;
                $my_reservations->contact_no = $contact_no;
                $my_reservations->total_amount = $total_amount;

                $this->load->model('functions');
                $my_reservations->unique_id = $this->functions->get_token(10);
                $my_reservations->save();

                foreach($room_types->result() as $type)
                {
                    if ($room_reservations[$type->id] > 0)
                    {
                        $rooms = $this->db->order_by('id', 'asc')->get_where('rooms_db', array('type_id' => $type->id, 'status' => 0));
                        $rooms_data = $rooms->result();
                        for($i = 0; $i < $room_reservations[$type->id]; $i++)
                        {
                            $room_rsv = new Db_table('room_reservations');
	                        $room_rsv->generate_fields();
                            $room_rsv->reservation_id = $my_reservations->id;
                            $room_rsv->room_id = $rooms_data[$i]->id;
                            $room_rsv->save();

                            $room = new Db_table('rooms_db');
	                        $room->generate_fields();
                            $room->load($rooms_data[$i]->id);
                            $room->status = 1;
                            $room->save();
                        }
                    }
                }
                redirect('/reservation/summary/'.$my_reservations->unique_id);
			} else {
                $data['errors'] = validation_errors();
            }

            $data['room_types'] = $room_types->result();
		    $module['content'] = $this->load->view('template/reservation', $data, TRUE);
            $module['title'] = 'Reserve';
            $module['menu'] = $this->load->view('menu/default', NULL, TRUE);
            $this->load->view('template/base-template', $module);
		}
	}

    function summary($unique_id = '')
	{
		if ($message = $this->session->flashdata('message')) {
			$message = $this->session->flashdata('message');
			$module['content'] = $this->load->view('auth/general_message', array('message' => $message), TRUE);
			$module['title'] = 'Notification';
			$module['menu'] = $this->load->view('menu/default', NULL, TRUE);
			$this->load->view('template/base-template', $module);
		} elseif(! empty($unique_id)) {
		    $query = $this->db->get_where('my_reservations', array('unique_id' => $unique_id));
            $reservation = $query->result();
            if(count($reservation) > 0){
                $row = $query->row();
                $data['lname'] = $row->last_name;
                $data['fname'] = $row->first_name;
                $data['mname'] = $row->middle_name;
                $data['email'] = $row->email;
                $data['contact_no'] = $row->contact_no;
                $data['ref_no'] = $unique_id;
                $data['total'] = $row->total_amount;
                $data['date'] = date('d F Y', strtotime($row->date_added));
                $data['checkin'] = date('d F Y', strtotime($row->check_in));
                $data['checkout'] = date('d F Y', strtotime($row->check_out));
                $query = $this->db->select('rooms_db.number, rooms_db.custom_rate, room_types.type_name, room_types.rate')->join('rooms_db','rooms_db.id = room_reservations.room_id')->join('room_types','room_types.id = rooms_db.type_id')->get_where('room_reservations', array('reservation_id' => $row->id));
                $data['room_reservations'] = $query->result();
    		    $module['content'] = $this->load->view('template/rsr-summary', $data, TRUE);
                $module['title'] = 'Reserve';
                $module['menu'] = $this->load->view('menu/default', NULL, TRUE);
                $module['styles'] = array('style');
                $this->load->view('template/base-template', $module);
            } else {
                redirect('');
            }

		} else {
            redirect('');
		}
	}

}

/* End of file reservation.php */
/* Location: ./application/controllers/reservation.php */