
    <p><strong>Name : </strong>{{ $record->name }}</p>
     <p><strong>Operator :</strong> {{ $record->operator }}</p>
     <p><strong>Country :</strong> {{ $record->country }}</p>
     <p><strong>Status :</strong> {{ $record->status }}</p>
     <p><strong>Date Sub :</strong> {{ \Carbon\Carbon::parse($record->date_sub)->format('d/m/Y H:i') }}</p>
     <p><strong>Date Valid :</strong> {{ \Carbon\Carbon::parse($record->date_sub)->format('d/m/Y H:i')}}</p>
     <p><strong>Updated Date :</strong> {{ \Carbon\Carbon::parse($record->updated_at)->format('d/m/Y H:i')}}</p>
     <p><strong>Commentaire :</strong> {{ $record->commentaire }}</p>