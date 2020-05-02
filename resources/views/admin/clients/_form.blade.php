        <!-- <input type="hidden" name="_method" value="PUT"> -->
        <!-- <input type="hidden" name="client_type" value="{{ $clientType }}"> -->
        {{ Form::hidden('client_type', $clientType) }}
        @component('admin.form._form_group', ['field' => 'name'])
            {{ Form::label('name', 'Nome', ['class' => 'control-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        @endcomponent

        @component('admin.form._form_group', ['field' => 'document_number'])
            {{ Form::label('document_number', 'Documento', ['class' => 'control-label']) }}
            {{ Form::text('document_number', null, ['class' => 'form-control']) }}
        @endcomponent

        @component('admin.form._form_group', ['field' => 'email'])
            {{ Form::label('email', 'E-mail', ['class' => 'control-label']) }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}
        @endcomponent

        @component('admin.form._form_group', ['field' => 'phone'])
            {{ Form::label('phone', 'Telefone', ['class' => 'control-label']) }}
            {{ Form::text('phone', null, ['class' => 'form-control']) }}
        @endcomponent
        
        @if($clientType == \App\Client::TYPE_INDIVIDUAL)
            @php
                $maritalStatus = $client->marital_status;
            @endphp
            
            @component('admin.form._form_group', ['field' => 'marital_status'])
                {{ Form::label('marital_status', 'Estado civil', ['class' => 'control-label']) }}
                {{ Form::select('marital_status', [
                    '' => 'Selecione o estado civil',
                    1  => 'Solteiro',
                    2  => 'Casado',
                    3  => 'Divorciado'  
                    ], null, ['class' => 'form-control']) 
                }}
            @endcomponent
        
            @component('admin.form._form_group', ['field' => 'date_birth'])
                {{ Form::label('date_birth', 'Data Nasc.', ['class' => 'control-label']) }}
                {{ Form::date('date_birth', null, ['class' => 'form-control'])}}
            @endcomponent

            @component('admin.form._has_error', ['field' => 'sex'])
                <label>
                    {{ Form::radio('sex', 'm') }} Masculino
                </label>
            @endcomponent

            @component('admin.form._has_error', ['field' => 'sex'])
                <label>
                    {{ Form::radio('sex', 'f') }} Feminino
                </label>
            @endcomponent

            @include('admin.form._help_block', ['field' => 'sex'])

            @component('admin.form._form_group', ['field' => 'physical_disability'])
                {{ Form::label('physical_disability', 'Deficiência Física', ['class' => 'control-label']) }}
                {{ Form::text('physical_disability', null, ['class' => 'form-control']) }}
            @endcomponent
        @else
            @component('admin.form._form_group', ['field' => 'company_name'])
                {{ Form::label('company_name', 'Nome Fantasia', ['class' => 'control-label']) }}
                {{ Form::text('company_name', null, ['class' => 'form-control']) }}
            @endcomponent
        @endif
            <div class="checkbox">
                <label>
                    {{ Form::checkbox('defaulter', 1) }} Inadimplente?
                </label>
            </div>