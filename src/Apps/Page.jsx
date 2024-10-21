import React from "react";
import {Button} from "@/components/ui/button";
import MainHeader from "@/Apps/MainHeader";
function Page() {
    return (
        <>
            <MainHeader/>
            <h1> Button </h1>
            <Button className=" pl-1 pr-2 pt-1 pb-1 " variant="outline">Button</Button>
        </>
    );
}

export default Page;