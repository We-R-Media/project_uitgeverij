<?php

namespace App\Imports;

use App\Models\Advertiser;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AdvertiserImport implements ToCollection, WithStartRow
{
    public function startRow(): int
    {
        return 2; // Assuming header is in the first row
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Advertiser::create([
                'name' => $row[0],         // Bedrijfsnaam
                'last_name' => $row[1],     // Contactpersoon
                'address' => $row[2],      // Adres
                'postal_code' => $row[3],  // Postcode
                'city' => $row[4],         // Plaats
                'province' => $row[5],     // Provincie
                'phone' => $row[6],        // Telefoon
                'phone_mobile' => $row[7], // Mobiel
                'email' => $row[8],        // Email
            ]);
        }
    }
}


// class ContactImport implements ToCollection, WithStartRow
// {
//     public function startRow(): int 
//     {
//         return 2;
//     }
    
//     public function collection(Collection $rows)
//     {
//         foreach ($rows as $row) {
//             $salutationParts = $this->splitSalutation($row[15]);

    
//             try {
//                 // Create a new Contact instance and set its attributes
//                 $contact = Contact::create([
//                     'salutation' => $salutationParts['salutation'],
//                     'initial' => $salutationParts['initial'],
//                     'last_name' => $salutationParts['last_name'],
//                     'email' => $row[14],
//                 ]);
    
//                 // Save the Contact record to the database
//                 $contact->save();
//             } catch (\Exception $e) {
//                 // Log or dump the exception for debugging
//                 \Log::error($e->getMessage());
//             }
//         }
//     }

//     function splitSalutation($salutation)
//     {
//         // Regular expression to split the salutation
//         $pattern = '/^(de heer|de dame|mevrouw)?\s*([A-Z]\.[A-Z]\.)?\s*([A-Za-z]+)$/i';

//         preg_match($pattern, $salutation, $matches);


//         // Extracted parts
//         $parts = [
//             'salutation' => isset($matches[1]) ? $matches[1] : null,
//             'initial' => isset($matches[2]) ? $matches[2] : null,
//             'last_name' => isset($matches[3]) ? $matches[3] : null,
//         ];
    
//         return $parts;
//     }
    
// }
