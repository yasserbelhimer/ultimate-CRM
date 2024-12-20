<?php

    namespace App\Http\Requests\Campaigns;

    use App\Rules\ExcelRule;
    use Illuminate\Foundation\Http\FormRequest;

    class MMSImportRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize(): bool
        {
            return $this->user()->can('mms_bulk_messages');
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules(): array
        {
            return [
                'name'          => 'required',
                'import_file'   => ['required', new ExcelRule(request()->file('import_file'))],
                'mms_file'      => 'required|mimes:mp4,mov,ogg,qt,jpeg,png,jpg,gif,bmp,webp|max:20000',
                'timezone'      => 'required_if:schedule,true|timezone',
                'schedule_date' => 'required_if:schedule,true|date|nullable',
                'schedule_time' => 'required_if:schedule,true|date_format:H:i',
            ];
        }

    }
