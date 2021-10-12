@extends('components.template')
@section('content')
    <div id="vueTest">
        <div class="container">
            @{{ mad.name }}
            <button class="btn btn-info"@click="showModal">show modal</button>
            <teacher-modal ref="modal" :test="mad"></teacher-modal>
        </div>
    </div>

    <template id="example-modal">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><input type="text" v-model="test.name"/></h5>
                        <h5 class="modal-title" id="exampleModalLabel"><input type="text" v-model="test.get"/></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        hihi
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </template>
@endsection
@section('javascript')
    <script src="{{ asset('js/vueTest.js') }}" type="module"></script>
@stop
