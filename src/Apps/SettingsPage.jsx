import React from "react";
import { Button } from "@/components/ui/button";
import {Badge} from "@/components/ui/badge";
import MainHeader from "@/Apps/MainHeader";
function SettingsPage() {
    return (
        <>
            <MainHeader/>
            <h1> Badge </h1>
            <Badge className=" pl-1 pr-2 pt-1 pb-1 " variant="outline">Badge</Badge>
        </>
    );
}

export default SettingsPage;