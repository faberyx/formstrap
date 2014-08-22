<script type="text/javascript">
    // custom values are available via $values array
    $(function() {
        $('.validateform').bootstrapValidator({
            excluded: [':disabled', ':hidden', ':not(:visible)'],
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            live: 'enabled',
            message: 'This value is not valid',
            submitButtons: 'button[type="submit"]',
            fields: {           
            @foreach ( $rules as $k => $v )
                {{$k}}:{
                    validators:{
                    @foreach ($v as $kk => $vk )
                        @if (is_array($vk))
                            {{$kk}} :{
                            @foreach ($vk as $kb => $vb)
                                {{$kb}}: {{$vb}}, 
                            @endforeach
                            },
                        @else
                            {{$kk}}:{
                                {{$vk}}
                            },
                        @endif
                    @endforeach
                    }
                },
            @endforeach
            }
    });
});


</script>