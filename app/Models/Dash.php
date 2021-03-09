<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Dash extends Model
{
    use HasFactory;

    
    public function showdata(){

        $results = DB::select("select(

            select count(c.CaseNumber) from CaseHistory as ch 
            left join [case] as c with(nolock) on
            c.CaseNumber = ch.CaseNumber
            
            where ch.Summary like '%New Case created with Status Awaiting Return and assigned to the skill Acer.Retail%'  and DATEADD(dd, DATEDIFF(dd, 0, ch.actiondate), 0)between  DATEADD(dd, DATEDIFF(dd, 0, getdate()), 0) and DATEADD(dd, DATEDIFF(dd, 0, getdate()), 0)  and CaseType like 'Repair Centre'  and ch.Action <> 'Case Resolved' 
            ) bookedin,
            
            
            
            (select count(c.CaseNumber) from CaseHistory as ch 
            join [case] as c with(nolock) on
            c.CaseNumber = ch.CaseNumber
            
            where ch.Summary like '%dispatch to res%' and  CaseType like 'Repair Centre' and  DATEADD(dd, DATEDIFF(dd, 0, actiondate), 0)  between  DATEADD(dd, DATEDIFF(dd, 0, getdate()), 0) and DATEADD(dd, DATEDIFF(dd, 0, getdate()), 0)
            and ch.action = 'Case Resolved' and c.CaseStatus like 'Resolved'
            ) as dispatched,
            
            (
            select  count(c.CaseNumber) from CaseHistory as ch 
             join [case] as c with(nolock) on
            c.CaseNumber = ch.CaseNumber
            
            where ch.Summary like '%to awaiting dispatch' and DATEADD(dd, DATEDIFF(dd, 0, ch.actiondate), 0) between  DATEADD(dd, DATEDIFF(dd, 0, getdate()), 0) and DATEADD(dd, DATEDIFF(dd, 0, getdate()), 0)  and CaseType like 'Repair Centre'  and Action like 'Status Change'
            ---and CaseStatus <> 'Resolved' and 
            
            ) as EngineerRepairs,
            (
            select  count(c.CaseNumber) from CaseHistory as ch 
             join [case] as c with(nolock) on
            c.CaseNumber = ch.CaseNumber
            
            where ch.Summary like '%Awaiting Inspection' and DATEADD(dd, DATEDIFF(dd, 0, ch.actiondate), 0) between  DATEADD(dd, DATEDIFF(dd, 0, getdate()), 0) and DATEADD(dd, DATEDIFF(dd, 0, getdate()), 0)  and CaseType like 'Repair Centre'  and Action like 'Status Change'
            
            
            ) as AwaitingInsp,
            (
            select  count(c.CaseNumber) from CaseHistory as ch 
             join [case] as c with(nolock) on
            c.CaseNumber = ch.CaseNumber
            
             where DATEADD(dd, DATEDIFF(dd, 0, ch.actiondate), 0) between  DATEADD(dd, DATEDIFF(dd, 0, getdate()), 0) and DATEADD(dd, DATEDIFF(dd, 0, getdate()), 0)    and  Summary like '% Awaiting Inspection to%' and Action like 'Status Change'
            ) as Inspected");

            return $results;

    }

}
