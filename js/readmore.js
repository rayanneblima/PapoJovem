$(document).ready(function () {

    $('.tgl').before('<span><font color=red>Ler mais »</font></span>');

    $('.tgl').css('display', 'none')

    $('span', '.box-toggle').click(function () {

        $(this).next().slideToggle('slow')

            .siblings('.tgl:visible').slideToggle('fast');

        $(this).toggleText('Ler mais »', '« ocultar')

            .siblings('span').next('.tgl:visible').prev()

            .toggleText('Ler mais »', '« ocultar')

    });

	})
	
