<?php

use App\Models\Localization;

$translates = Localization::pluck('word',"english")->toArray();
$reversedTranslates = array_flip($translates);





$list =  [
    "doctors" => "Doctors",
    "hospitals" => "Hospitals",
    "surgery_support" => "Surgery Support",
    "hospital_diagnostic" => "Hospital & Diagnostic",
    "blood_donors_club" => "Blood Donors Club",
    "home_medical_service" => "Home Medical Service",
    "blog" => "Blog",
    "en" => "English",
    "bn" => "বাংলা",
    "find" => "Find",
    "search" => "Search",
    "search_doctors" => "Search Doctors",
    "search_hospitals" => "Search Hospitals",
    "start_finding" => "Start Finding",
    "your_nearby_location" => "Your Nearby Location",
    "best_doctors" => "Best Doctors",
    "location" => "Location",
    "services" => "Services",
    "about_us" => "About Us",
    "search_for_doctors" => "Search for Doctors",
    "search_for_hospitals" => "Search for Hospitals",
    "contact_us" => "Contact Us",
    "join_our_newsletter" => "Join Our Newsletter",
    "privacy_policy" => "Privacy Policy",
    "terms_and_conditions" => "Terms & Conditions",
    "submit" => "Submit",
    "comprehensive_healthcare" => "Comprehensive Healthcare Information Solution for Bangladesh with DoctorInfoBD",
    "filter" => "Filter",
    "departments" => "Departments",
    "treated_conditions_include" => "Treated conditions include",
    "doctor_fee" => "Doctor Fee",
    "old_patient" => "Old Patient",
    "new_patient" => "New Patient",
    "chamber_address_schedule" => "Chamber Address & Schedule",
    "address" => "Address",
    "schedule" => "Schedule",
    "hospital" => "Hospital",
    "clinic" => "Clinic",
    "category" => "Category",
    "our_services" => "Our Services",
    "contact" => "Contact",
    "home" => "Home",
    "search" => "Search",
    "blog_categories" => "Blog Categories",
    "blog_details"=>"Blog Details",
    "latest_post" => "Latest Post",
    "related_post" => "Related Post",
    "view_blog" => "View Blog",
    "find_healthcare_provider" => "Find healthcare providers and medical facilities offering online doctor and hospital services.",
    "comprehensive_healthcare_details" => "Our comprehensive healthcare information solution for Bangladesh, in collaboration with DoctorInfoBD, offers a one-stop platform for accessing vital medical resources and connecting patients with trusted healthcare providers, including the best doctor information available. With this innovative solution, we are committed to enhancing healthcare accessibility and improving outcomes for the people of Bangladesh.",
    "about_our_company" => "About Our Company",
    "experienced_doctors" => "Experienced Doctors",
    "doctorinfobd_is_an_online_based_health_services" => "Doctorinfobd.com is an online based health services provider's info-sharing platform. We try to provide an easy and good connection for patients to consult specialist doctors for any health issue.",
    "have_very_easily_the_process_of_specialized_doctors" => "Easy Appointments: We've very easily the process of specialized doctors' Appointments. With Doctorinfobd.com, you can confirm a free schedule of appointments with a specialist doctor in just a few minutes. No more waiting, no more hassle - just efficient healthcare access at your fingertips.",
    "huge_medical_nformation" => "Huge Medical Information: Need information on blood groups, hospitals, clinics, diagnostic centers, or ambulance services. Doctorinfobd.com is your comprehensive guide. Find contact details and phone numbers very easily.",
    "user_friendly_medical_content" => "User-Friendly Medical Content: We believe that medical information should be accessible to everyone. That's why we've designed Doctorinfobd.com to present complex medical content in a simple, user-friendly manner.",
    "vast_network" => "Vast Network: With Doctorinfobd.com, you can easily book appointments with experienced doctors in specialized categories. Your health needs are our priority.",
    "health_related_consultation" => "Also, you can contact our call center for any health-related consultation and receive your required services very easily.",
    "book_appointment" => "Book Appointment",
    "call_for_appointment" => "Call For Appointment",
    "diagnostic" => "Diagnostic",
];

if (count($reversedTranslates) && count($reversedTranslates) == count($list)) {
    return $reversedTranslates;
}
return $list;