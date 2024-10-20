import React, { useState, useEffect } from 'react';
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge"

const App = () => {
    return (
        <>
            <h1 className="text-3xl font-bold underline">
                <Button >Button</Button>
                <Badge className="border-4 border-black rounded-none" variant="outline">Badge</Badge>
            </h1>
        </>
    );
};
export default App;