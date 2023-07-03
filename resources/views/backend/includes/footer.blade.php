<!-- Vendor js -->
        <script src="{{asset('assets/backend/js/vendor.min.js')}}"></script>

        <!-- Dashboard App js -->
        <script src="{{asset('assets/backend/js/pages/demo.dashboard.js')}}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @yield('script')
        <!-- App js -->
        <script src="{{asset('assets/backend/js/app.js')}}"></script>
        <script src="{{asset('assets/backend/js/script.js')}}"></script>
        <script src="https://originalrides.ca/assets/js/Notifier.js"></script>
            
            @if(session()->has('message')) 
                <script>
                    var notifier = new Notifier();
                    notifier.notify('success', {{session()->get('message')}});
                </script>
            @endif
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <script>
                        var notifier = new Notifier();
                        notifier.notify('danger',"{{$error}}")
                    </script>
                @endforeach
            @endif        
    </body>
</html> 