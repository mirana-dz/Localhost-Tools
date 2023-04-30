<h3>HTTP response status codes</h3>
<div><p>
        HTTP response status codes indicate whether a specific HTTP request has been successfully completed.
        Responses are grouped in five classes:
    </p>
    <ol>
        <li><a href="#information_responses">Informational responses</a> (<code>100</code>–<code>199</code>)</li>
        <li><a href="#successful_responses">Successful responses</a> (<code>200</code>–<code>299</code>)</li>
        <li><a href="#redirection_messages">Redirection messages</a> (<code>300</code>–<code>399</code>)</li>
        <li><a href="#client_error_responses">Client error responses</a> (<code>400</code>–<code>499</code>)</li>
        <li><a href="#server_error_responses">Server error responses</a> (<code>500</code>–<code>599</code>)</li>
    </ol>
    <div class="notecard note" id="sect1">
        <p><strong>Note:</strong> If you receive a response that is not in this list, it is a non-standard response,
            possibly custom to the server's software.</p>
    </div>
</div>
<hr>
<h2 id="information_responses"><a href="#information_responses" title="Permalink to Information responses">Information
        responses</a></h2>
<div>
    <dl>
        <dt id="100_continue"><code>100 Continue</code></dt>
        <dd>
            <p>This interim response indicates that the client should continue the request or ignore the response if
                the request is already finished.</p>
        </dd>
        <dt id="101_switching_protocols"><code>101 Switching Protocols</code></dt>
        <dd>
            <p>This code is sent in response to an <code>Upgrade</code> request header from the client and indicates
                the protocol the server is switching to.</p>
        </dd>
        <dt id="102_processing"><code>102 Processing</code> (WebDAV)</dt>
        <dd>
            <p>This code indicates that the server has received and is processing the request, but no response is
                available yet.</p>
        </dd>
        <dt id="103_early_hints"><code>103 Early Hints</code></dt>
        <dd>
            <p>This status code is primarily intended to be used with the <code>Link</code> header, letting the user
                agent start preloading resources while the server prepares a response.</p>
        </dd>
    </dl>
</div>
<div class="separator marginT20 marginB20"></div>
<h2 id="successful_responses"><a href="#successful_responses" title="Permalink to Successful responses">Successful
        responses</a></h2>
<div>
    <dl>
        <dt id="200_ok"><code>200 OK</code></dt>
        <dd>
            <p>The request succeeded. The result meaning of "success" depends on the HTTP method:</p>
            <ul>
                <li><code>GET</code>: The resource has been fetched and transmitted in the message body.</li>
                <li><code>HEAD</code>: The representation headers are included in the response without any message
                    body.
                </li>
                <li><code>PUT</code> or <code>POST</code>: The resource describing the result of the action is
                    transmitted in the message body.
                </li>
                <li><code>TRACE</code>: The message body contains the request message as received by the server.
                </li>
            </ul>
        </dd>
        <dt id="201_created"><code>201 Created</code></dt>
        <dd>
            <p>The request succeeded, and a new resource was created as a result. This is typically the response
                sent after <code>POST</code> requests, or some <code>PUT</code> requests.</p>
        </dd>
        <dt id="202_accepted"><code>202 Accepted</code></dt>
        <dd>
            <p>
                The request has been received but not yet acted upon.
                It is noncommittal, since there is no way in HTTP to later send an asynchronous response indicating
                the outcome of the request.
                It is intended for cases where another process or server handles the request, or for batch
                processing.
            </p>
        </dd>
        <dt id="203_non-authoritative_information"><code>203 Non-Authoritative Information</code></dt>
        <dd>
            <p>
                This response code means the returned metadata is not exactly the same as is available from the
                origin server, but is collected from a local or a third-party copy.
                This is mostly used for mirrors or backups of another resource.
                Except for that specific case, the <code>200 OK</code> response is preferred to this status.
            </p>
        </dd>
        <dt id="204_no_content"><code>204 No Content</code></dt>
        <dd>
            <p>
                There is no content to send for this request, but the headers may be useful.
                The user agent may update its cached headers for this resource with the new ones.
            </p>
        </dd>
        <dt id="205_reset_content"><code>205 Reset Content</code></dt>
        <dd>
            <p>Tells the user agent to reset the document which sent this request.</p>
        </dd>
        <dt id="206_partial_content"><code>206 Partial Content</code></dt>
        <dd>
            <p>This response code is used when the <code>Range</code> header is sent from the client to request only
                part of a resource.</p>
        </dd>
        <dt id="207_multi-status"><code>207 Multi-Status</code> (WebDAV)</dt>
        <dd>
            <p>Conveys information about multiple resources, for situations where multiple status codes might be
                appropriate.</p>
        </dd>
        <dt id="208_already_reported"><code>208 Already Reported</code> (WebDAV)</dt>
        <dd>
            <p>Used inside a <code>&lt;dav:propstat&gt;</code> response element to avoid repeatedly enumerating the
                internal members of multiple bindings to the same collection.</p>
        </dd>
        <dt id="226_im_used"><code>226 IM Used</code> (HTTP Delta encoding)</dt>
        <dd>
            <p>The server has fulfilled a <code>GET</code> request for the resource, and the response is a
                representation of the result of one or more instance-manipulations applied to the current instance.
            </p>
        </dd>
    </dl>
</div>
<div class="separator marginT20 marginB20"></div>
<h2 id="redirection_messages"><a href="#redirection_messages" title="Permalink to Redirection messages">Redirection
        messages</a></h2>
<div>
    <dl>
        <dt id="300_multiple_choice"><code>300 Multiple Choice</code></dt>
        <dd>
            <p>The request has more than one possible response. The user agent or user should choose one of them.
                (There is no standardized way of choosing one of the responses, but HTML links to the possibilities
                are recommended so the user can pick.)</p>
        </dd>
        <dt id="301_moved_permanently">301 Moved Permanently</code></dt>
        <dd>
            <p>The URL of the requested resource has been changed permanently. The new URL is given in the
                response.</p>
        </dd>
        <dt id="302_found"><code>302 Found</code></dt>
        <dd>
            <p>
                This response code means that the URI of requested resource has been changed <em>temporarily</em>.
                Further changes in the URI might be made in the future. Therefore, this same URI should be used by
                the client in future requests.
            </p>
        </dd>
        <dt id="303_see_other"><code>303 See Other</code></dt>
        <dd>
            <p>The server sent this response to direct the client to get the requested resource at another URI with
                a GET request.</p>
        </dd>
        <dt id="304_not_modified"><code>304 Not Modified</code></dt>
        <dd>
            <p>
                This is used for caching purposes.
                It tells the client that the response has not been modified, so the client can continue to use the
                same cached version of the response.
            </p>
        </dd>
        <dt id="305_use_proxy"><code><s>305 Use Proxy</s></code></dt>
        <dd>
            <p>
                Defined in a previous version of the HTTP specification to indicate that a requested response must
                be accessed by a proxy.
                It has been deprecated due to security concerns regarding in-band configuration of a proxy.
            </p>
        </dd>
        <dt id="306_unused"><code><s>306 unused</s></code></dt>
        <dd>
            <p>This response code is no longer used; it is just reserved. It was used in a previous version of the
                HTTP/1.1 specification.</p>
        </dd>
        <dt id="307_temporary_redirect"><code>307 Temporary Redirect</code></dt>
        <dd>
            <p>
                The server sends this response to direct the client to get the requested resource at another URI
                with same method that was used in the prior request.
                This has the same semantics as the <code>302 Found</code> HTTP response code, with the exception
                that the user agent <em>must not</em> change the HTTP method used: if a <code>POST</code> was used
                in the first request, a <code>POST</code> must be used in the second request.
            </p>
        </dd>
        <dt id="308_permanent_redirect"><code>308 Permanent Redirect</code></dt>
        <dd>
            <p>
                This means that the resource is now permanently located at another URI, specified by the
                <code>Location:</code>
                HTTP Response header.
                This has the same semantics as the <code>301 Moved Permanently</code> HTTP response code, with the
                exception that the user agent <em>must not</em> change the HTTP method used: if a <code>POST</code>
                was used in the first request, a <code>POST</code> must be used in the second request.
            </p>
        </dd>
    </dl>
</div>
<div class="separator marginT20 marginB20"></div>
<h2 id="client_error_responses"><a href="#client_error_responses" title="Permalink to Client error responses">Client
        error responses</a></h2>
<div>
    <dl>
        <dt id="400_bad_request"><code>400 Bad Request</code></dt>
        <dd>
            <p>The server cannot or will not process the request due to something that is perceived to be a client
                error (e.g., malformed request syntax, invalid request message framing, or deceptive request
                routing).</p>
        </dd>
        <dt id="401_unauthorized"><code>401 Unauthorized</code></dt>
        <dd>
            <p>
                Although the HTTP standard specifies "unauthorized", semantically this response means
                "unauthenticated".
                That is, the client must authenticate itself to get the requested response.
            </p>
        </dd>
        <dt id="402_payment_required"><code>402 Payment Required</code></dt>
        <dd>
            <p>
                This response code is reserved for future use.
                The initial aim for creating this code was using it for digital payment systems, however this status
                code is used very rarely and no standard convention exists.
            </p>
        </dd>
        <dt id="403_forbidden"><code>403 Forbidden</code></dt>
        <dd>
            <p>
                The client does not have access rights to the content; that is, it is unauthorized, so the server is
                refusing to give the requested resource.
                Unlike <code>401 Unauthorized</code>, the client's identity is known to the server.
            </p>
        </dd>
        <dt id="404_not_found"><code>404 Not Found</code></dt>
        <dd>
            <p>
                The server can not find the requested resource.
                In the browser, this means the URL is not recognized.
                In an API, this can also mean that the endpoint is valid but the resource itself does not exist.
                Servers may also send this response instead of <code>403 Forbidden</code> to hide the existence of a
                resource from an unauthorized client.
                This response code is probably the most well known due to its frequent occurrence on the web.
            </p>
        </dd>
        <dt id="405_method_not_allowed"><code>405 Method Not Allowed</code></dt>
        <dd>
            <p>
                The request method is known by the server but is not supported by the target resource.
                For example, an API may not allow calling <code>DELETE</code> to remove a resource.
            </p>
        </dd>
        <dt id="406_not_acceptable"><code>406 Not Acceptable</code></dt>
        <dd>
            <p>This response is sent when the web server, after performing server-driven content negotiation,
                doesn't find any content that conforms to the criteria given by the user agent.</p>
        </dd>
        <dt id="407_proxy_authentication_required"><code>407 Proxy Authentication Required</code></dt>
        <dd>
            <p>This is similar to <code>401 Unauthorized</code> but authentication is needed to be done by a proxy.
            </p>
        </dd>
        <dt id="408_request_timeout"><code>408 Request Timeout</code></dt>
        <dd>
            <p>
                This response is sent on an idle connection by some servers, even without any previous request by
                the client.
                It means that the server would like to shut down this unused connection.
                This response is used much more since some browsers, like Chrome, Firefox 27+, or IE9, use HTTP
                pre-connection mechanisms to speed up surfing.
                Also note that some servers merely shut down the connection without sending this message.
            </p>
        </dd>
        <dt id="409_conflict"><code>409 Conflict</code></dt>
        <dd>
            <p>This response is sent when a request conflicts with the current state of the server.</p>
        </dd>
        <dt id="410_gone"><code>410 Gone</code></dt>
        <dd>
            <p>
                This response is sent when the requested content has been permanently deleted from server, with no
                forwarding address.
                Clients are expected to remove their caches and links to the resource.
                The HTTP specification intends this status code to be used for "limited-time, promotional services".
                APIs should not feel compelled to indicate resources that have been deleted with this status code.
            </p>
        </dd>
        <dt id="411_length_required"><code>411 Length Required</code></dt>
        <dd>
            <p>Server rejected the request because the <code>Content-Length</code> header field is not defined and
                the server requires it.</p>
        </dd>
        <dt id="412_precondition_failed"><code>412 Precondition Failed</code></dt>
        <dd>
            <p>The client has indicated preconditions in its headers which the server does not meet.</p>
        </dd>
        <dt id="413_payload_too_large"><code>413 Payload Too Large</code></dt>
        <dd>
            <p>
                Request entity is larger than limits defined by server.
                The server might close the connection or return an <code>Retry-After</code> header field.
            </p>
        </dd>
        <dt id="414_uri_too_long"><code>414 URI Too Long</code></dt>
        <dd>
            <p>The URI requested by the client is longer than the server is willing to interpret.</p>
        </dd>
        <dt id="415_unsupported_media_type"><code>415 Unsupported Media Type</code></dt>
        <dd>
            <p>The media format of the requested data is not supported by the server, so the server is rejecting the
                request.</p>
        </dd>
        <dt id="416_range_not_satisfiable"><code>416 Range Not Satisfiable</code></dt>
        <dd>
            <p>
                The range specified by the <code>Range</code> header field in the request cannot be fulfilled.
                It's possible that the range is outside the size of the target URI's data.
            </p>
        </dd>
        <dt id="417_expectation_failed"><code>417 Expectation Failed</code></dt>
        <dd>
            <p>This response code means the expectation indicated by the <code>Expect</code> request header field
                cannot be met by the server.</p>
        </dd>
        <dt id="418_im_a_teapot"><code>418 I'm a teapot</code></dt>
        <dd>
            <p>The server refuses the attempt to brew coffee with a teapot.</p>
        </dd>
        <dt id="421_misdirected_request"><code>421 Misdirected Request</code></dt>
        <dd>
            <p>
                The request was directed at a server that is not able to produce a response.
                This can be sent by a server that is not configured to produce responses for the combination of
                scheme and authority that are included in the request URI.
            </p>
        </dd>
        <dt id="422_unprocessable_entity"><code>422 Unprocessable Entity</code> (WebDAV)</dt>
        <dd>
            <p>The request was well-formed but was unable to be followed due to semantic errors.</p>
        </dd>
        <dt id="423_locked"><code>423 Locked</code> (WebDAV)</dt>
        <dd>
            <p>The resource that is being accessed is locked.</p>
        </dd>
        <dt id="424_failed_dependency"><code>424 Failed Dependency</code> (WebDAV)</dt>
        <dd>
            <p>The request failed due to failure of a previous request.</p>
        </dd>
        <dt id="425_too_early"><code>425 Too Early</code></dt>
        <dd>
            <p>Indicates that the server is unwilling to risk processing a request that might be replayed.</p>
        </dd>
        <dt id="426_upgrade_required"><code>426 Upgrade Required</code></dt>
        <dd>
            <p>
                The server refuses to perform the request using the current protocol but might be willing to do so
                after the client upgrades to a different protocol.
                The server sends an <code>Upgrade</code> header in a 426 response to indicate the required
                protocol(s).
            </p>
        </dd>
        <dt id="428_precondition_required"><code>428 Precondition Required</code></dt>
        <dd>
            <p>
                The origin server requires the request to be conditional.
                This response is intended to prevent the 'lost update' problem, where a client <code>GET</code>s a
                resource's state, modifies it and <code>PUT</code>s it back to the server, when meanwhile a third
                party has modified the state on the server, leading to a conflict.
            </p>
        </dd>
        <dt id="429_too_many_requests"><code>429 Too Many Requests</code></dt>
        <dd>
            <p>The user has sent too many requests in a given amount of time ("rate limiting").</p>
        </dd>
        <dt id="431_request_header_fields_too_large"><code>431 Request Header Fields Too Large</code></dt>
        <dd>
            <p>
                The server is unwilling to process the request because its header fields are too large.
                The request may be resubmitted after reducing the size of the request header fields.
            </p>
        </dd>
        <dt id="451_unavailable_for_legal_reasons"><code>451 Unavailable For Legal Reasons</code></dt>
        <dd>
            <p>The user agent requested a resource that cannot legally be provided, such as a web page censored by a
                government.</p>
        </dd>
    </dl>
</div>
<div class="separator marginT20 marginB20"></div>
<h2 id="server_error_responses"><a href="#server_error_responses" title="Permalink to Server error responses">Server
        error responses</a></h2>
<div>
    <dl>
        <dt id="500_internal_server_error"><code>500 Internal Server Error</code></dt>
        <dd>
            <p>The server has encountered a situation it does not know how to handle.</p>
        </dd>
        <dt id="501_not_implemented"><code>501 Not Implemented</code></dt>
        <dd>
            <p>The request method is not supported by the server and cannot be handled. The only methods that
                servers are required to support (and therefore that must not return this code) are <code>GET</code>
                and <code>HEAD</code>.</p>
        </dd>
        <dt id="502_bad_gateway"><code>502 Bad Gateway</code></dt>
        <dd>
            <p>This error response means that the server, while working as a gateway to get a response needed to
                handle the request, got an invalid response.</p>
        </dd>
        <dt id="503_service_unavailable"><code>503 Service Unavailable</code></dt>
        <dd>
            <p>
                The server is not ready to handle the request.
                Common causes are a server that is down for maintenance or that is overloaded.
                Note that together with this response, a user-friendly page explaining the problem should be sent.
                This response should be used for temporary conditions and the <code>Retry-After</code> HTTP header
                should, if possible, contain the estimated time before the recovery of the service.
                The webmaster must also take care about the caching-related headers that are sent along with this
                response, as these temporary condition responses should usually not be cached.
            </p>
        </dd>
        <dt id="504_gateway_timeout"><code>504 Gateway Timeout</code></dt>
        <dd>
            <p>This error response is given when the server is acting as a gateway and cannot get a response in
                time.</p>
        </dd>
        <dt id="505_http_version_not_supported"><code>505 HTTP Version Not Supported</code></dt>
        <dd>
            <p>The HTTP version used in the request is not supported by the server.</p>
        </dd>
        <dt id="506_variant_also_negotiates"><code>506 Variant Also Negotiates</code></dt>
        <dd>
            <p>The server has an internal configuration error: the chosen variant resource is configured to engage
                in transparent content negotiation itself, and is therefore not a proper end point in the
                negotiation process.</p>
        </dd>
        <dt id="507_insufficient_storage"><code>507 Insufficient Storage</code> (WebDAV)</dt>
        <dd>
            <p>The method could not be performed on the resource because the server is unable to store the
                representation needed to successfully complete the request.</p>
        </dd>
        <dt id="508_loop_detected"><code>508 Loop Detected</code> (WebDAV)</dt>
        <dd>
            <p>The server detected an infinite loop while processing the request.</p>
        </dd>
        <dt id="510_not_extended"><code>510 Not Extended</code></dt>
        <dd>
            <p>Further extensions to the request are required for the server to fulfill it.</p>
        </dd>
        <dt id="511_network_authentication_required"><code>511 Network Authentication Required</code></dt>
        <dd>
            <p>Indicates that the client needs to authenticate to gain network access.</p>
        </dd>
    </dl>
</div>