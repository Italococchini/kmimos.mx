<?php

class Reservas {
    
    private $db;
    private $data;

    public $sql;

    function Reservas($db, $data){
        $this->db = $db;
        $this->data = $data;
    }

    function new_reserva(){

        $this->new_order();

        $this->new_item();

        extract($this->data);

        $sql = "
            INSERT INTO
                wp_posts 
            VALUES (
                NULL, 
                '{$cliente}', 
                '{$hoy}',
                '{$hoy}',
                '', 
                'Reserva - {$token}', 
                '', 
                '{$status_reserva}', 
                'closed', 
                'closed', 
                '', 
                'reserva-{$token}', 
                '', 
                '', 
                '{$hoy}',
                '{$hoy}',
                '', 
                {$id_order},
                'http://www.kmimos.com.mx/?post_type=wc_booking',
                0, 
                'wc_booking', 
                '', 
                0
            );
        ";
        $this->db->multi_query($sql);

        $this->data["id_reserva"] = $this->db->insert_id();



        $this->create_metas_reserva();

        $this->update_item();
        
        return $this->data["id_order"];
    }

    function update_item(){
        extract($this->data);
        
        $sql = "UPDATE wp_woocommerce_order_itemmeta SET meta_value = '{$id_reserva}' WHERE order_item_id = {$id_item} AND meta_key = 'Reserva ID'";

        $this->db->multi_query($sql);
    }

    function create_metas_reserva(){
        extract($this->data);
        
        $sql = "
            INSERT INTO wp_postmeta VALUES
                (NULL, '{$id_reserva}', '_booking_customer_id',     '{$cliente}'),
                (NULL, '{$id_reserva}', '_booking_all_day',         '1'),
                (NULL, '{$id_reserva}', '_booking_start',           '{$inicio}000000'),
                (NULL, '{$id_reserva}', '_booking_end',             '{$fin}235959'),
                (NULL, '{$id_reserva}', '_booking_cost',            '{$monto}'),
                (NULL, '{$id_reserva}', '_booking_persons',         '{$num_mascotas}'),
                (NULL, '{$id_reserva}', '_booking_order_item_id',   '{$id_item}'),
                (NULL, '{$id_reserva}', '_booking_product_id',      '{$servicio}');
        ";

        $this->db->multi_query($sql);
    }

    function new_order(){
        extract($this->data);
        $sql = "
            INSERT INTO
                wp_posts 
            VALUES (
                NULL, 
                1, 
                '{$hoy}', 
                '{$hoy}', 
                '', 
                'Orden - {$token}', 
                '', 
                '{$status_orden}', 
                'closed', 
                'closed', 
                '', 
                'orden-{$token}', 
                '', 
                '', 
                '{$hoy}', 
                '{$hoy}', 
                '', 
                0,
                'http://www.kmimos.com.mx/?post_type=shop_order',
                0, 
                'shop_order', 
                '', 
                0
            );
        ";

        $this->db->multi_query($sql);

        $this->data["id_order"] = $this->db->insert_id();

        $this->create_metas_order();

    }

    function create_metas_order(){
        extract($this->data);
        
        $remanente = "";
        if( $deposito["enable"] == "yes" ){
            $total = $deposito["deposit"];
            $remanente = "(NULL, '{$id_order}', '_wc_deposits_remaining', '{$deposito["remaining"]}'),";
        }else{
            $total = $monto;
        }

        $sql = "
            INSERT INTO wp_postmeta VALUES
            {$remanente}
            (NULL, '{$id_order}', '_customer_user',                         '{$cliente}'),
            (NULL, '{$id_order}', '_order_total',                           '{$total}'),
            (NULL, '{$id_order}', '_order_key',                             'wc_order_{$token}'),
            (NULL, '{$id_order}', '_order_stock_reduced',                   '1'),
            (NULL, '{$id_order}', '_cart_discount_tax',                     '0'),
            (NULL, '{$id_order}', '_cart_discount',                         '0'),
            (NULL, '{$id_order}', '_order_version',                         '2.5.5'),
            (NULL, '{$id_order}', '_payment_method',                        '{$metodo_pago}'),
            (NULL, '{$id_order}', '_recorded_sales',                        'yes'),
            (NULL, '{$id_order}', '_download_permissions_granted',          '1'),
            (NULL, '{$id_order}', '_order_shipping_tax',                    '0'),
            (NULL, '{$id_order}', '_order_tax',                             '0'),
            (NULL, '{$id_order}', '_order_shipping',                        ''),
            (NULL, '{$id_order}', '_payment_method_title',                  '{$metodo_pago_titulo}'),
            (NULL, '{$id_order}', '_created_via',                           'checkout'),
            (NULL, '{$id_order}', '_customer_user_agent',                   ''),
            (NULL, '{$id_order}', '_customer_ip_address',                   '::1'),
            (NULL, '{$id_order}', '_prices_include_tax',                    'yes'),
            (NULL, '{$id_order}', '_order_currency',                        '{$moneda}');
        ";

        $this->db->multi_query( $sql );
    }

    function new_item(){
        extract($this->data);

        $sql = "
            INSERT INTO
                wp_woocommerce_order_items
            VALUES (
                NULL, 
                '{$titulo_servicio}', 
                'line_item', 
                '{$id_order}'
            );
        ";

        $this->db->multi_query($sql);

        $this->data["id_item"] = $this->db->insert_id();
        
        $this->create_metas_item();
    }

    function create_metas_item(){
        extract($this->data);

        $mascotas = "";
        foreach ($this->data["mascotas"] as $key => $value) {
            $mascotas .= "(NULL, '{$id_item}', '{$key}', '{$value}'),";
        }

        $deposito = serialize($deposito);

        // $deposito = str_replace('"', '\"', $deposito);
        $mascotas = str_replace('"', '\"', $mascotas);

        $sql = "
            INSERT INTO wp_woocommerce_order_itemmeta VALUES
            (NULL, '{$id_item}', 'Reserva ID', '{$id_reserva}'),
            (NULL, '{$id_item}', 'Duración', '{$duracion_formato}'),

            {$mascotas}

            (NULL, '{$id_item}', '_line_total',    '{$monto}'),
            (NULL, '{$id_item}', '_line_subtotal', '{$monto}'),
            (NULL, '{$id_item}', 'Fecha de Reserva', '{$fecha_formato}'),
            (NULL, '{$id_item}', '_product_id', '{$servicio}'),
            (NULL, '{$id_item}', 'Ofrecido por', '{$cuidador}'),
            (NULL, '{$id_item}', '_wc_deposit_meta', '{$deposito}'),

            (NULL, '{$id_item}', '_line_tax_data', 'a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),
            (NULL, '{$id_item}', '_line_tax', '0'),
            (NULL, '{$id_item}', '_line_subtotal_tax', '0'),
            (NULL, '{$id_item}', '_variation_id', '0'),
            (NULL, '{$id_item}', '_tax_class', ''),
            (NULL, '{$id_item}', '_qty', '1');
        ";

        $this->sql = $sql;

        $this->db->multi_query( utf8_decode($sql) );
    }

}

?>