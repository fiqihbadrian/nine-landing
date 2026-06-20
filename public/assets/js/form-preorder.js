$(document).ready(function() {
    let currentStok = {
        s: 0,
        m: 0,
        l: 0,
        xl: 0,
        xxl: 0
    };

    $('#id_produk').on('change', function() {
        const $selected = $(this).find(':selected');
        const kategori = $selected.data('kategori');
        
        currentStok.s = parseInt($selected.data('stok-s')) || 0;
        currentStok.m = parseInt($selected.data('stok-m')) || 0;
        currentStok.l = parseInt($selected.data('stok-l')) || 0;
        currentStok.xl = parseInt($selected.data('stok-xl')) || 0;
        currentStok.xxl = parseInt($selected.data('stok-xxl')) || 0;
        
        if (kategori) {
            $('#produkInfo').html('<i class="fas fa-tag"></i> Kategori: ' + kategori);
        } else {
            $('#produkInfo').html('');
        }
        
        updateUkuranOptions();
    });

    function updateUkuranOptions() {
        const $ukuran = $('#ukuran');
        $ukuran.html('<option value="">Pilih Ukuran</option>');
        
        const sizes = [
            {value: 'S', label: 'S (Small)', stok: currentStok.s},
            {value: 'M', label: 'M (Medium)', stok: currentStok.m},
            {value: 'L', label: 'L (Large)', stok: currentStok.l},
            {value: 'XL', label: 'XL (Extra Large)', stok: currentStok.xl},
            {value: 'XXL', label: 'XXL (Double XL)', stok: currentStok.xxl}
        ];
        
        $.each(sizes, function(i, size) {
            if (size.stok > 0) {
                $ukuran.append(
                    $('<option>', {
                        value: size.value,
                        text: size.label + ' (Stok: ' + size.stok + ')',
                        'data-stok': size.stok
                    })
                );
            }
        });
        
        $('#stokUkuranInfo, #stokInfo').html('');
        $('#jumlah').val('').removeAttr('max');
    }

    $('#ukuran').on('change', function() {
        const $selected = $(this).find(':selected');
        const stok = $selected.data('stok');
        
        if (stok) {
            $('#stokUkuranInfo').html('Stok tersedia: ' + stok + ' pcs');
            $('#jumlah').attr('max', stok);
        } else {
            $('#stokUkuranInfo').html('');
            $('#jumlah').removeAttr('max');
        }
    });
});
